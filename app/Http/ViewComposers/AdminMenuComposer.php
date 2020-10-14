<?php


namespace App\Http\ViewComposers;

use Illuminate\View\View;

class AdminMenuComposer
{

    /** Binding data to view
     *
     * @param  View  $view
     *
     * @return View
     * @throws \Exception
     * */
    public function compose(View $view)
    {
        try {

            $menus = $this->AdminDashboardMenu();

        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            $menus = [];
        }
       

        return $view->with('menuDashboard', $menus);
    }

    /** Render item game dashboard menu
     *
     * */
    public function AdminDashboardMenu()
    {
        $route = request()->route();
        $menus = [
            [
                'url'    => route('admin.dashboard'),
                'label'  => 'Dashboard',
                'icon'   => '<i class="nav-icon fas fa-tachometer-alt"></i>',
                'prefix' => 'dashboard'
            ],
            [
                'url'    => route('admin.category.index'),
                'label'  => 'Danh mục',
                'icon'   => '<i class="fas fa-clipboard-list nav-icon"></i>',
                'prefix' => 'category',
                // 'children' => [
                //                 [
                //                     'url'    => route('admin.category.index'),
                //                     'label'  => 'Danh sách',
                //                     'icon'   => '<i class="far fa-circle"></i>',
                //                     'prefix' => 'category/list',
                //                 ],
                //                 [
                //                     'url'    => route('admin.category.create'),
                //                     'label'  => 'Thêm mới',
                //                     'icon'   => '<i class="far fa-circle"></i>',
                //                     'prefix' => 'category/create',
                //                 ]
                // ]
            ],
            [
                'url'    => route('admin.attribute.list'),
                'label'  => 'Thuộc tính',
                'icon'   => '<i class="fas fa-palette nav-icon"></i>',
                'prefix' => 'attribute',
                // 'children' => [
                //                 [
                //                     'url'    => route('admin.attribute.list'),
                //                     'label'  => 'Danh sách',
                //                     'icon'   => '<i class="far fa-circle"></i>',
                //                     'prefix' => 'attribute/list',
                //                 ]
                // ]
            ],
            [
                'url'    => route('admin.product.list'),
                'label'  => 'Sản phẩm',
                'icon'   => '<i class="fas fa-campground nav-icon"></i>',
                'prefix' => 'san-pham/danh-sach',
                'children' => [
                                [
                                    'url'    => route('admin.product.list'),
                                    'label'  => 'Danh sách',
                                    'icon'   => '<i class="far fa-circle"></i>',
                                    'prefix' => 'san-pham/danh-sach',
                                ],
                                [
                                    'url'    => route('admin.product.create'),
                                    'label'  => 'Thêm mới',
                                    'icon'   => '<i class="far fa-circle"></i>',
                                    'prefix' => 'san-pham/them-moi',
                                ]
                ]
            ],
            [
                'url'    => route('admin.banner.list'),
                'label'  => 'Banner',
                'icon'   => '<i class="fab fa-slideshare nav-icon"></i>',
                'prefix' => 'banner',
                'children' => [
                                [
                                    'url'    => route('admin.banner.index'),
                                    'label'  => 'Danh sách',
                                    'icon'   => '<i class="far fa-circle"></i>',
                                    'prefix' => 'banner/list',
                                ],
                                [
                                    'url'    => route('admin.banner.create'),
                                    'label'  => 'Thêm mới',
                                    'icon'   => '<i class="far fa-circle"></i>',
                                    'prefix' => 'banner/create',
                                ]
                ]
            ],
            [
                'url'    => route('admin.order.list'),
                'label'  => 'Đơn hàng',
                'icon'   => '<i class="fab fa-slideshare nav-icon"></i>',
                'prefix' => 'don-hang',
                'children' => [
                                [
                                    'url'    => route('admin.order.list'),
                                    'label'  => 'Danh sách',
                                    'icon'   => '<i class="far fa-circle"></i>',
                                    'prefix' => 'don-hang/don-hang-chua-xu-ly.html',
                                ],
                                [
                                    'url'    => route('admin.order.approved'),
                                    'label'  => 'Đã xử lý',
                                    'icon'   => '<i class="far fa-circle"></i>',
                                    'prefix' => 'don-hang/don-hang-da-xu-ly.html',
                                ]
                ]
            ]

         ];
        //  print_r($route->uri) ;
        $menus = array_map(function ($menu) use ($route) {
            $menu['active'] = (strpos($route->uri, $menu['prefix']) !== false) ? 'active' : '';
            if ($menu['prefix'] === 'admin') {
                $menu['active'] = ($route->uri === $menu['prefix']) ? 'active' : '';
            }
            $menu['class'] = '';
            if (isset($menu['children'])) {
                $menu['class'] = 'has-treeview';
                $children      = [];
                foreach ($menu['children'] as $child) {
                    $child['active'] = (strpos($route->uri, $child['prefix']) !== false) ? 'active' : '';
                    $menu['class']   .= ($child['active'] === 'active') ? ' menu-open' : '';
                    $children[]      = $child;
                }
                $menu['children'] = $children;

            }

            return $menu;
        }, $menus);
        return $menus;
    }
}
