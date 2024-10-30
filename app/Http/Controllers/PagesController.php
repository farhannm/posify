<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;

class PagesController extends Controller
{
    // Landing
    public function viewLandingPage()
    {
        return view('landing');
    }

    // Cashier Pages
    public function     cashierDashboard()
    {
        $products = Product::all();
        $categories = Categories::all();
        return view('pages/cashier/dashboard', compact('products', 'categories'));
    }

    public function ownerDashboard()
    {
        $analysis = new AnalysisController();
        $totalRevenue = $analysis->revenue();

        return view('pages/owner/dashboard', compact('totalRevenue'));
    }

    // Admin Pages
    public function adminDashboard()
    {
        return view('pages/admin/dashboard');
    }

    public function elementsAvatar()
    {
        return view('pages/admin/elements-avatar');
    }

    public function elementsAlert()
    {
        return view('pages/admin/elements-alert');
    }

    public function elementsBadge()
    {
        return view('pages/admin/elements-badge');
    }

    public function elementsBreadcrumb()
    {
        return view('pages/admin/elements-breadcrumb');
    }

    public function elementsButton()
    {
        return view('pages/admin/elements-button');
    }

    public function elementsButtonGroup()
    {
        return view('pages/admin/elements-button-group');
    }

    public function elementsCard()
    {
        return view('pages/admin/elements-card');
    }

    public function elementsDivider()
    {
        return view('pages/admin/elements-divider');
    }

    public function elementsMask()
    {
        return view('pages/admin/elements-mask');
    }

    public function elementsProgress()
    {
        return view('pages/admin/elements-progress');
    }

    public function elementsSkeleton()
    {
        return view('pages/admin/elements-skeleton');
    }

    public function elementsSpinner()
    {
        return view('pages/admin/elements-spinner');
    }

    public function elementsTag()
    {
        return view('pages/admin/elements-tag');
    }

    public function elementsTooltip()
    {
        return view('pages/admin/elements-tooltip');
    }

    public function elementsTypography()
    {
        return view('pages/admin/elements-typography');
    }

    public function componentsAccordion()
    {
        return view('pages/admin/components-accordion');
    }

    public function componentsCollapse()
    {
        return view('pages/admin/components-collapse');
    }

    public function componentsTab()
    {
        return view('pages/admin/components-tab');
    }

    public function componentsDropdown()
    {
        return view('pages/admin/components-dropdown');
    }

    public function componentsPopover()
    {
        return view('pages/admin/components-popover');
    }

    public function componentsModal()
    {
        return view('pages/admin/components-modal');
    }

    public function componentsDrawer()
    {
        return view('pages/admin/components-drawer');
    }

    public function componentsSteps()
    {
        return view('pages/admin/components-steps');
    }

    public function componentsTimeline()
    {
        return view('pages/admin/components-timeline');
    }

    public function componentsPagination()
    {
        return view('pages/admin/components-pagination');
    }

    public function componentsMenuList()
    {
        return view('pages/admin/components-menu-list');
    }

    public function componentsTreeview()
    {
        return view('pages/admin/components-treeview');
    }

    public function componentsTable()
    {
        return view('pages/admin/components-table');
    }

    public function componentsTableAdvanced()
    {
        return view('pages/admin/components-table-advanced');
    }

    public function componentsTableGridjs()
    {
        return view('pages/admin/components-table-gridjs');
    }

    public function componentsApexchart()
    {
        return view('pages/admin/components-apexchart');
    }

    public function componentsCarousel()
    {
        return view('pages/admin/components-carousel');
    }

    public function componentsNotification()
    {
        return view('pages/admin/components-notification');
    }

    public function componentsExtensionClipboard()
    {
        return view('pages/admin/components-extension-clipboard');
    }

    public function componentsExtensionPersist()
    {
        return view('pages/admin/components-extension-persist');
    }

    public function componentsExtensionMonochrome()
    {
        return view('pages/admin/components-extension-monochrome');
    }

    public function formsLayoutV1()
    {
        return view('pages/admin/forms-layout-v1');
    }

    public function formsLayoutV2()
    {
        return view('pages/admin/forms-layout-v2');
    }

    public function formsLayoutV3()
    {
        return view('pages/admin/forms-layout-v3');
    }

    public function formsLayoutV4()
    {
        return view('pages/admin/forms-layout-v4');
    }

    public function formsLayoutV5()
    {
        return view('pages/admin/forms-layout-v5');
    }

    public function formsInputText()
    {
        return view('pages/admin/forms-input-text');
    }

    public function formsInputGroup()
    {
        return view('pages/admin/forms-input-group');
    }

    public function formsInputMask()
    {
        return view('pages/admin/forms-input-mask');
    }

    public function formsCheckbox()
    {
        return view('pages/admin/forms-checkbox');
    }

    public function formsRadio()
    {
        return view('pages/admin/forms-radio');
    }

    public function formsSwitch()
    {
        return view('pages/admin/forms-switch');
    }

    public function formsSelect()
    {
        return view('pages/admin/forms-select');
    }

    public function formsTomSelect()
    {
        return view('pages/admin/forms-tom-select');
    }

    public function formsTextarea()
    {
        return view('pages/admin/forms-textarea');
    }

    public function formsRange()
    {
        return view('pages/admin/forms-range');
    }

    public function formsDatepicker()
    {
        return view('pages/admin/forms-datepicker');
    }

    public function formsTimepicker()
    {
        return view('pages/admin/forms-timepicker');
    }

    public function formsDatetimepicker()
    {
        return view('pages/admin/forms-datetimepicker');
    }

    public function formsTextEditor()
    {
        return view('pages/admin/forms-text-editor');
    }

    public function formsUpload()
    {
        return view('pages/admin/forms-upload');
    }

    public function formsValidation()
    {
        return view('pages/admin/forms-validation');
    }

    public function layoutsOnboarding1()
    {
        return view('pages/admin/layouts-onboarding-1');
    }

    public function layoutsOnboarding2()
    {
        return view('pages/admin/layouts-onboarding-2');
    }

    public function layoutsUserCard1()
    {
        return view('pages/admin/layouts-user-card-1');
    }

    public function layoutsUserCard2()
    {
        return view('pages/admin/layouts-user-card-2');
    }

    public function layoutsUserCard3()
    {
        return view('pages/admin/layouts-user-card-3');
    }

    public function layoutsUserCard4()
    {
        return view('pages/admin/layouts-user-card-4');
    }

    public function layoutsUserCard5()
    {
        return view('pages/admin/layouts-user-card-5');
    }

    public function layoutsUserCard6()
    {
        return view('pages/admin/layouts-user-card-6');
    }

    public function layoutsUserCard7()
    {
        return view('pages/admin/layouts-user-card-7');
    }

    public function layoutsBlogCard1()
    {
        return view('pages/admin/layouts-blog-card-1');
    }

    public function layoutsBlogCard2()
    {
        return view('pages/admin/layouts-blog-card-2');
    }

    public function layoutsBlogCard3()
    {
        return view('pages/admin/layouts-blog-card-3');
    }

    public function layoutsBlogCard4()
    {
        return view('pages/admin/layouts-blog-card-4');
    }

    public function layoutsBlogCard5()
    {
        return view('pages/admin/layouts-blog-card-5');
    }

    public function layoutsBlogCard6()
    {
        return view('pages/admin/layouts-blog-card-6');
    }

    public function layoutsBlogCard7()
    {
        return view('pages/admin/layouts-blog-card-7');
    }

    public function layoutsBlogCard8()
    {
        return view('pages/admin/layouts-blog-card-8');
    }

    public function layoutsBlogDetails()
    {
        return view('pages/admin/layouts-blog-details');
    }

    public function layoutsHelp1()
    {
        return view('pages/admin/layouts-help-1');
    }

    public function layoutsHelp2()
    {
        return view('pages/admin/layouts-help-2');
    }

    public function layoutsHelp3()
    {
        return view('pages/admin/layouts-help-3');
    }

    public function layoutsPriceList1()
    {
        return view('pages/admin/layouts-price-list-1');
    }

    public function layoutsPriceList2()
    {
        return view('pages/admin/layouts-price-list-2');
    }

    public function layoutsPriceList3()
    {
        return view('pages/admin/layouts-price-list-3');
    }

    public function layoutsInvoice1()
    {
        return view('pages/admin/layouts-invoice-1');
    }

    public function layoutsInvoice2()
    {
        return view('pages/admin/layouts-invoice-2');
    }

    public function layoutsSignIn1()
    {
        return view('pages/admin/layouts-sign-in-1');
    }

    public function layoutsSignIn2()
    {
        return view('pages/admin/layouts-sign-in-2');
    }

    public function layoutsSignUp1()
    {
        return view('pages/admin/layouts-sign-up-1');
    }

    public function layoutsSignUp2()
    {
        return view('pages/admin/layouts-sign-up-2');
    }

    public function layoutsError4041()
    {
        return view('pages/admin/layouts-error-404-1');
    }

    public function layoutsError4042()
    {
        return view('pages/admin/layouts-error-404-2');
    }

    public function layoutsError4043()
    {
        return view('pages/admin/layouts-error-404-3');
    }

    public function layoutsError4044()
    {
        return view('pages/admin/layouts-error-404-4');
    }

    public function layoutsError401()
    {
        return view('pages/admin/layouts-error-401');
    }

    public function layoutsError429()
    {
        return view('pages/admin/layouts-error-429');
    }

    public function layoutsError500()
    {
        return view('pages/admin/layouts-error-500');
    }

    public function layoutsStarterBlurredHeader()
    {
        return view('pages/admin/layouts-starter-blurred-header');
    }

    public function layoutsStarterUnblurredHeader()
    {
        return view('pages/admin/layouts-starter-unblurred-header');
    }

    public function layoutsStarterCenteredLink()
    {
        return view('pages/admin/layouts-starter-centered-link');
    }

    public function layoutsStarterMinimalSidebar()
    {
        return view('pages/admin/layouts-starter-minimal-sidebar');
    }

    public function layoutsStarterSideblock()
    {
        return view('pages/admin/layouts-starter-sideblock');
    }

    public function appsChat()
    {
        return view('pages/admin/apps-chat');
    }

    public function appsFilemanager()
    {
        return view('pages/admin/apps-filemanager');
    }

    public function appsKanban()
    {
        return view('pages/admin/apps-kanban');
    }

    public function appsList()
    {
        return view('pages/admin/apps-list');
    }

    public function appsMail()
    {
        return view('pages/admin/apps-mail');
    }

    public function appsNft1()
    {
        return view('pages/admin/apps-nft-1');
    }
    public function appsNft2()
    {
        return view('pages/admin/apps-nft-2');
    }

    public function appsPos()
    {
        return view('pages/admin/apps-pos');
    }

    public function appsTodo()
    {
        return view('pages/admin/apps-todo');
    }

    public function appsTravel()
    {
        return view('pages/admin/apps-travel');
    }

    public function dashboardsCrmAnalytics()
    {
        return view('pages/admin/dashboards-crm-analytics');
    }

    public function dashboardsOrders()
    {
        return view('pages/admin/dashboards-orders');
    }

    public function dashboardsCrypto1()
    {
        return view('pages/admin/dashboards-crypto1');
    }

    public function dashboardsCrypto2()
    {
        return view('pages/admin/dashboards-crypto2');
    }

    public function dashboardsBanking1()
    {
        return view('pages/admin/dashboards-banking1');
    }

    public function dashboardsBanking2()
    {
        return view('pages/admin/dashboards-banking2');
    }

    public function dashboardsPersonal()
    {
        return view('pages/admin/dashboards-personal');
    }

    public function dashboardsCmsAnalytics()
    {
        return view('pages/admin/dashboards-cms-analytics');
    }

    public function dashboardsInfluencer()
    {
        return view('pages/admin/dashboards-influencer');
    }

    public function dashboardsTravel()
    {
        return view('pages/admin/dashboards-travel');
    }

    public function dashboardsTeacher()
    {
        return view('pages/admin/dashboards-teacher');
    }

    public function dashboardsAuthors()
    {
        return view('pages/admin/dashboards-authors');
    }

    public function dashboardsEducation()
    {
        return view('pages/admin/dashboards-education');
    }
    public function dashboardsDoctor()
    {
        return view('pages/admin/dashboards-doctor');
    }

    public function dashboardsEmployees()
    {
        return view('pages/admin/dashboards-employees');
    }

    public function dashboardsWorkspaces()
    {
        return view('pages/admin/dashboards-workspaces');
    }

    public function dashboardsMeetings()
    {
        return view('pages/admin/dashboards-meetings');
    }

    public function dashboardsProjectBoards()
    {
        return view('pages/admin/dashboards-project-boards');
    }

    public function dashboardsWidgetUi()
    {
        return view('pages/admin/dashboards-widget-ui');
    }

    public function dashboardsWidgetContacts()
    {
        return view('pages/admin/dashboards-widget-contacts');
    }
}
