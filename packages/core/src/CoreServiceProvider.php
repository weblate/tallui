<?php

declare(strict_types=1);

namespace Moox\Core;

use Filament\Support\Facades\FilamentIcon;
use Moox\Core\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class CoreServiceProvider extends PackageServiceProvider
{
    public function boot()
    {
        parent::boot();

        $this->useGoogleIcons();
    }

    public function configurePackage(Package $package): void
    {
        $package
            ->name('core')
            ->hasConfigFile()
            ->hasTranslations()
            ->hasCommand(InstallCommand::class);
    }

    public function useGoogleIcons()
    {
        FilamentIcon::register([
            'panels::global-search.field' => 'gmdi-search-o',
            'panels::pages.dashboard.actions.filter' => 'gmdi-filter-alt-o',
            'panels::pages.dashboard.navigation-item' => 'gmdi-space-dashboard',
            'panels::pages.password-reset.request-password-reset.actions.login' => 'gmdi-login-o',
            'panels::pages.password-reset.request-password-reset.actions.login.rtl' => 'gmdi-login-o',
            'panels::resources.pages.edit-record.navigation-item' => 'gmdi-edit-o',
            'panels::resources.pages.manage-related-records.navigation-item' => 'gmdi-manage-accounts-o',
            'panels::resources.pages.view-record.navigation-item' => 'gmdi-visibility-o',
            'panels::sidebar.collapse-button' => 'gmdi-menu-open-o',
            'panels::sidebar.collapse-button.rtl' => 'gmdi-menu-open-o',
            'panels::sidebar.expand-button' => 'gmdi-menu-o',
            'panels::sidebar.expand-button.rtl' => 'gmdi-menu-o',
            'panels::sidebar.group.collapse-button' => 'gmdi-expand-more-o',
            'panels::tenant-menu.billing-button' => 'gmdi-payment-o',
            'panels::tenant-menu.profile-button' => 'gmdi-person-o',
            'panels::tenant-menu.registration-button' => 'gmdi-person-add-o',
            'panels::tenant-menu.toggle-button' => 'gmdi-menu-o',
            'panels::theme-switcher.light-button' => 'gmdi-light-mode-o',
            'panels::theme-switcher.dark-button' => 'gmdi-dark-mode-o',
            'panels::theme-switcher.system-button' => 'gmdi-settings-o',
            'panels::topbar.close-sidebar-button' => 'gmdi-close-o',
            'panels::topbar.open-sidebar-button' => 'gmdi-menu-o',
            'panels::topbar.group.toggle-button' => 'gmdi-toggle-on-o',
            'panels::topbar.open-database-notifications-button' => 'gmdi-notifications-o',
            'panels::user-menu.profile-item' => 'gmdi-person-o',
            'panels::user-menu.logout-button' => 'gmdi-logout-o',
            'panels::widgets.account.logout-button' => 'gmdi-logout-o',
            'panels::widgets.filament-info.open-documentation-button' => 'gmdi-library-books-o',
            //'panels::widgets.filament-info.open-github-button' => 'gmdi-github-o',
            'forms::components.builder.actions.clone' => 'gmdi-content-copy-o',
            'forms::components.builder.actions.collapse' => 'gmdi-expand-less-o',
            'forms::components.builder.actions.delete' => 'gmdi-delete-o',
            'forms::components.builder.actions.expand' => 'gmdi-expand-more-o',
            'forms::components.builder.actions.move-down' => 'gmdi-keyboard-arrow-down',
            'forms::components.builder.actions.move-up' => 'gmdi-keyboard-arrow-up',
            'forms::components.builder.actions.reorder' => 'gmdi-drag-indicator-o',
            'forms::components.checkbox-list.search-field' => 'gmdi-search-o',
            'forms::components.file-upload.editor.actions.drag-crop' => 'gmdi-crop-o',
            'forms::components.file-upload.editor.actions.drag-move' => 'gmdi-drag-move-o',
            'forms::components.file-upload.editor.actions.flip-horizontal' => 'gmdi-flip-camera-horizontal-o',
            'forms::components.file-upload.editor.actions.flip-vertical' => 'gmdi-flip-camera-vertical-o',
            'forms::components.file-upload.editor.actions.move-down' => 'gmdi-keyboard-arrow-down',
            'forms::components.file-upload.editor.actions.move-left' => 'gmdi-keyboard-arrow-left',
            'forms::components.file-upload.editor.actions.move-right' => 'gmdi-keyboard-arrow-right',
            'forms::components.file-upload.editor.actions.move-up' => 'gmdi-keyboard-arrow-up',
            'forms::components.file-upload.editor.actions.rotate-left' => 'gmdi-rotate-left-o',
            'forms::components.file-upload.editor.actions.rotate-right' => 'gmdi-rotate-right-o',
            'forms::components.file-upload.editor.actions.zoom-100' => 'gmdi-zoom-in-o',
            'forms::components.file-upload.editor.actions.zoom-in' => 'gmdi-zoom-in-o',
            'forms::components.file-upload.editor.actions.zoom-out' => 'gmdi-zoom-out-o',
            'forms::components.key-value.actions.delete' => 'gmdi-delete-o',
            'forms::components.key-value.actions.reorder' => 'gmdi-drag-indicator-o',
            'forms::components.repeater.actions.clone' => 'gmdi-content-copy-o',
            'forms::components.repeater.actions.collapse' => 'gmdi-expand-less-o',
            'forms::components.repeater.actions.delete' => 'gmdi-delete-o',
            'forms::components.repeater.actions.expand' => 'gmdi-expand-more-o',
            'forms::components.repeater.actions.move-down' => 'gmdi-keyboard-arrow-down',
            'forms::components.repeater.actions.move-up' => 'gmdi-keyboard-arrow-up',
            'forms::components.repeater.actions.reorder' => 'gmdi-drag-indicator-o',
            'forms::components.select.actions.create-option' => 'gmdi-add-o',
            'forms::components.select.actions.edit-option' => 'gmdi-edit-o',
            'forms::components.text-input.actions.hide-password' => 'gmdi-visibility-off-o',
            'forms::components.text-input.actions.show-password' => 'gmdi-visibility-o',
            'forms::components.toggle-buttons.boolean.false' => 'gmdi-toggle-off-o',
            'forms::components.toggle-buttons.boolean.true' => 'gmdi-toggle-on-o',
            'forms::components.wizard.completed-step' => 'gmdi-done-o',
            'tables::actions.disable-reordering' => 'gmdi-drag-indicator-o',
            'tables::actions.enable-reordering' => 'gmdi-drag-indicator-o',
            'tables::actions.filter' => 'gmdi-filter-list-o',
            'tables::actions.group' => 'gmdi-group-work-o',
            'tables::actions.open-bulk-actions' => 'gmdi-list-o',
            'tables::actions.toggle-columns' => 'gmdi-view-column-o',
            'tables::columns.collapse-button' => 'gmdi-expand-less-o',
            'tables::columns.icon-column.false' => 'gmdi-close-o',
            'tables::columns.icon-column.true' => 'gmdi-check-o',
            'tables::empty-state' => 'gmdi-inbox-o',
            'tables::filters.query-builder.constraints.boolean' => 'gmdi-toggle-on-o',
            'tables::filters.query-builder.constraints.date' => 'gmdi-event-o',
            'tables::filters.query-builder.constraints.number' => 'gmdi-exposure-o',
            'tables::filters.query-builder.constraints.relationship' => 'gmdi-link-o',
            'tables::filters.query-builder.constraints.select' => 'gmdi-arrow-drop-down-o',
            'tables::filters.query-builder.constraints.text' => 'gmdi-text-fields-o',
            'tables::filters.remove-all-button' => 'gmdi-clear-o',
            'tables::grouping.collapse-button' => 'gmdi-expand-less-o',
            'tables::header-cell.sort-asc-button' => 'gmdi-keyboard-arrow-up',
            'tables::header-cell.sort-desc-button' => 'gmdi-keyboard-arrow-down',
            'tables::reorder.handle' => 'gmdi-drag-indicator-o',
            'tables::search-field' => 'gmdi-search-o',
            'notifications::database.modal.empty-state' => 'gmdi-inbox-o',
            'notifications::notification.close-button' => 'gmdi-close-o',
            'notifications::notification.danger' => 'gmdi-error-o',
            'notifications::notification.info' => 'gmdi-info-o',
            'notifications::notification.success' => 'gmdi-check-circle-o',
            'notifications::notification.warning' => 'gmdi-warning-o',
            'actions::action-group' => 'gmdi-group-o',
            'actions::create-action.grouped' => 'gmdi-add-o',
            'actions::delete-action' => 'gmdi-delete-o',
            'actions::delete-action.grouped' => 'gmdi-delete-o',
            'actions::delete-action.modal' => 'gmdi-delete-o',
            'actions::detach-action' => 'gmdi-link-off-o',
            'actions::detach-action.modal' => 'gmdi-link-off-o',
            'actions::dissociate-action' => 'gmdi-link-off-o',
            'actions::dissociate-action.modal' => 'gmdi-link-off-o',
            'actions::edit-action' => 'gmdi-edit-o',
            'actions::edit-action.grouped' => 'gmdi-edit-o',
            'actions::export-action.grouped' => 'gmdi-file-download-o',
            'actions::force-delete-action' => 'gmdi-delete-forever-o',
            'actions::force-delete-action.grouped' => 'gmdi-delete-forever-o',
            'actions::force-delete-action.modal' => 'gmdi-delete-forever-o',
            'actions::import-action.grouped' => 'gmdi-file-upload-o',
            'actions::modal.confirmation' => 'gmdi-check-o',
            'actions::replicate-action' => 'gmdi-content-copy-o',
            'actions::replicate-action.grouped' => 'gmdi-content-copy-o',
            'actions::restore-action' => 'gmdi-restore-o',
            'actions::restore-action.grouped' => 'gmdi-restore-o',
            'actions::restore-action.modal' => 'gmdi-restore-o',
            'actions::view-action' => 'gmdi-visibility-o',
            'actions::view-action.grouped' => 'gmdi-visibility-o',
            'infolists::components.icon-entry.false' => 'gmdi-close-o',
            'infolists::components.icon-entry.true' => 'gmdi-check-o',
            'badge.delete-button' => 'gmdi-delete-o',
            'breadcrumbs.separator' => 'gmdi-chevron-right-o',
            'breadcrumbs.separator.rtl' => 'gmdi-chevron-left-o',
            'modal.close-button' => 'gmdi-close-o',
            'pagination.first-button' => 'gmdi-first-page-o',
            'pagination.first-button.rtl' => 'gmdi-first-page-o',
            'pagination.last-button' => 'gmdi-last-page-o',
            'pagination.last-button.rtl' => 'gmdi-last-page-o',
            'pagination.next-button' => 'gmdi-chevron-right-o',
            'pagination.next-button.rtl' => 'gmdi-chevron-left-o',
            'pagination.previous-button' => 'gmdi-chevron-left-o',
            'pagination.previous-button.rtl' => 'gmdi-chevron-right-o',
            'section.collapse-button' => 'gmdi-expand-less-o',
        ]);
    }
}
