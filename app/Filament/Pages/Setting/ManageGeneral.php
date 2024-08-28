<?php

namespace App\Filament\Pages\Setting;

use App\Services\FileService;
use App\Settings\GeneralSettings;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\SettingsPage;
use Filament\Support\Facades\FilamentView;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Facades\Storage;
use Riodwanto\FilamentAceEditor\AceEditor;

use function Filament\Support\is_app_url;

class ManageGeneral extends SettingsPage
{
    use HasPageShield;
    protected static string $settings = GeneralSettings::class;

    protected static ?int $navigationSort = 99;
    protected static ?string $navigationIcon = 'heroicon-o-cog-8-tooth';

    /**
     * @var array<string, mixed> | null
     */
    public ?array $data = [];

    public string $themePath = '';

    public string $twConfigPath = '';

    public function mount(): void
    {
        $this->themePath = resource_path('css/filament/admin/theme.css');
        $this->twConfigPath = resource_path('css/filament/admin/tailwind.config.js');

        $this->fillForm();
    }

    protected function fillForm(): void
    {
        $settings = app(static::getSettings());

        $data = $this->mutateFormDataBeforeFill($settings->toArray());

        $fileService = new FileService;

        $data['theme-editor'] = $fileService->readfile($this->themePath);

        $data['tw-config-editor'] = $fileService->readfile($this->twConfigPath);

        $this->form->fill($data);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Tabs')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Color Palette')
                            ->schema([
                                Forms\Components\ColorPicker::make('site_theme.primary')
                                    ->label(fn () => __('page.general_settings.fields.primary'))->rgb(),
                                Forms\Components\ColorPicker::make('site_theme.secondary')
                                    ->label(fn () => __('page.general_settings.fields.secondary'))->rgb(),
                                Forms\Components\ColorPicker::make('site_theme.gray')
                                    ->label(fn () => __('page.general_settings.fields.gray'))->rgb(),
                                Forms\Components\ColorPicker::make('site_theme.success')
                                    ->label(fn () => __('page.general_settings.fields.success'))->rgb(),
                                Forms\Components\ColorPicker::make('site_theme.danger')
                                    ->label(fn () => __('page.general_settings.fields.danger'))->rgb(),
                                Forms\Components\ColorPicker::make('site_theme.info')
                                    ->label(fn () => __('page.general_settings.fields.info'))->rgb(),
                                Forms\Components\ColorPicker::make('site_theme.warning')
                                    ->label(fn () => __('page.general_settings.fields.warning'))->rgb(),
                            ])
                            ->columns(3),
                        Forms\Components\Tabs\Tab::make('Code Editor')
                            ->schema([
                                Forms\Components\Grid::make()->schema([
                                    AceEditor::make('theme-editor')
                                        ->label('theme.css')
                                        ->mode('css')
                                        ->height('24rem'),
                                    AceEditor::make('tw-config-editor')
                                        ->label('tailwind.config.js')
                                        ->height('24rem')
                                ])
                            ]),
                    ])
                    ->persistTabInQueryString()
                    ->columnSpanFull(),
            ])
            ->columns(3)
            ->statePath('data');
    }

    public function save(): void
    {
        try {
            $data = $this->mutateFormDataBeforeSave($this->form->getState());

            $settings = app(static::getSettings());

            $settings->fill($data);
            $settings->save();

            $fileService = new FileService;
            $fileService->writeFile($this->themePath, $data['theme-editor']);
            $fileService->writeFile($this->twConfigPath, $data['tw-config-editor']);

            Notification::make()
                ->title('Settings updated.')
                ->success()
                ->send();

            $this->redirect(static::getUrl(), navigate: FilamentView::hasSpaMode() && is_app_url(static::getUrl()));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function getNavigationGroup(): ?string
    {
        return __("menu.nav_group.settings");
    }

    public static function getNavigationLabel(): string
    {
        return __("page.general_settings.navigationLabel");
    }

    public function getTitle(): string|Htmlable
    {
        return __("page.general_settings.title");
    }

    public function getHeading(): string|Htmlable
    {
        return __("page.general_settings.heading");
    }

    public function getSubheading(): string|Htmlable|null
    {
        return __("page.general_settings.subheading");
    }
}
