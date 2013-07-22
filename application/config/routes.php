<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "pages";
$route['404_override'] = '';

#PAGES
$route['admin/pages'] = 'pages/admin';
$route['admin/pages/(:num)'] = "pages/admin/index/$1";
$route['admin/pages/create'] = "pages/admin/create";
$route['admin/pages/edit/(:num)'] = "pages/admin/edit/$1";
$route['admin/pages/delete/(:num)'] = 'pages/admin/delete/$1';

#EDITABLE ELEMENTS
$route['admin/elements'] = 'elements/admin';
$route['admin/elements/(:num)'] = "elements/admin/index/$1";
$route['admin/elements/create'] = "elements/admin/create";
$route['admin/elements/edit/(:num)'] = "elements/admin/edit/$1";
$route['admin/elements/delete/(:num)'] = 'elements/admin/delete/$1';

#LABELS
$route['admin/labels'] = 'labels/admin';
$route['admin/labels/(:num)'] = "labels/admin/index/$1";
$route['admin/labels/create'] = "labels/admin/create";
$route['admin/labels/edit/(:num)'] = "labels/admin/edit/$1";
$route['admin/labels/delete/(:num)'] = 'labels/admin/delete/$1';

#MENUS
$route['admin/menus'] = 'menus/admin';
$route['admin/menus/(:num)'] = "menus/admin/index/$1";
$route['admin/menus/create'] = "menus/admin/create";
$route['admin/menus/edit/(:num)'] = "menus/admin/edit/$1";
$route['admin/menus/delete/(:num)'] = 'menus/admin/delete/$1';

#MENU ITEMS
$route['admin/menuitems/(:num)'] = 'menus/menuitems/index/$1';
$route['admin/menuitems/reorder/(:num)'] = 'menus/menuitems/reorder/$1';
$route['reorder_menuitems'] = 'menus/menuitems/reorder_menuitems';

#USERS
$route['admin/users'] = 'users/admin';
$route['admin/users/(:num)'] = "users/admin/index/$1";
$route['admin/users/create'] = "users/admin/create";
$route['admin/users/edit/(:num)'] = "users/admin/edit/$1";
$route['admin/users/delete/(:num)'] = 'users/admin/delete/$1';
$route['admin/users/profile'] = "users/admin/profile";

#NEWS
$route['admin/news'] = 'news/admin';
$route['admin/news/(:num)'] = "news/admin/index/$1";
$route['admin/news/fbpublish'] = 'news/admin/fbpublish';
$route['admin/news/create'] = "news/admin/create";
$route['admin/news/delete/(:num)'] = 'news/admin/delete/$1';
$route['admin/news/edit/(:num)'] = "news/admin/edit/$1";
$route['delete_news_image'] = "news/admin/delete_news_image";
$route['noticias|en/news'] = "news";
$route['noticias|en/news/(:any)'] = "news/$1";

#BLOG
$route['admin/blog'] = 'blog/admin';
$route['admin/blog/(:num)'] = "blog/admin/index/$1";
$route['admin/blog/fbpublish'] = 'blog/admin/fbpublish';
$route['admin/blog/create'] = "blog/admin/create";
$route['admin/blog/delete/(:num)'] = 'blog/admin/delete/$1';
$route['admin/blog/edit/(:num)'] = "blog/admin/edit/$1";
$route['delete_blog_image'] = "blog/admin/delete_blog_image";
$route['blog|en/blog'] = "blog";
$route['blog|en/blog/(:any)'] = "blog/$1";
$route['reorder_blog_images'] = "blog/admin/reorder_images";
$route['update_blog_image'] = "blog/admin/update_image";

#PROJECTS
$route['admin/projects'] = 'projects/admin';
$route['admin/projects/(:num)'] = "projects/admin/index/$1";
$route['admin/projects/fbpublish'] = 'projects/admin/fbpublish';
$route['admin/projects/create'] = "projects/admin/create";
$route['admin/projects/delete/(:num)'] = 'projects/admin/delete/$1';
$route['admin/projects/edit/(:num)'] = "projects/admin/edit/$1";
$route['delete_project_image'] = "projects/admin/delete_project_image";
$route['proyectos|en/projects'] = "projects";
$route['proyectos|en/projects/(:any)'] = "projects/$1";
$route['reorder_project_images'] = "projects/admin/reorder_images";
$route['update_project_image'] = "projects/admin/update_image";

#PHOTOGRAPHY
$route['admin/photography'] = 'photography/admin';
$route['admin/photography/(:num)'] = "photography/admin/index/$1";
$route['admin/photography/fbpublish'] = 'photography/admin/fbpublish';
$route['admin/photography/create'] = "photography/admin/create";
$route['admin/photography/delete/(:num)'] = 'photography/admin/delete/$1';
$route['admin/photography/edit/(:num)'] = "photography/admin/edit/$1";
$route['delete_photography_image'] = "photography/admin/delete_photography_image";
$route['fotografia|en/photography'] = "photography";
$route['fotografia|en/photography/(:any)'] = "photography/$1";
$route['reorder_photography_images'] = "photography/admin/reorder_images";
$route['update_photography_image'] = "photography/admin/update_image";

#DOWNLOADS
$route['admin/downloads'] = 'downloads/admin';
$route['descargas|en/downloads'] = "downloads";
$route['admin/downloads/create'] = "downloads/admin/create";
$route['admin/downloads/delete/(:num)'] = 'downloads/admin/delete/$1';
$route['admin/downloads/edit/(:num)'] = "downloads/admin/edit/$1";
$route['delete_image_pdf'] = "downloads/admin/delete_image_pdf";

#ADMIN
$route['admin/login|admin'] = 'admin/index';
$route['admin/logout'] = 'admin/logout';

$route['(\w{2})/(.*)'] = 'pages/index/$2';
$route['(\w{2})'] = $route['default_controller'];
$route['^(?!admin).*'] = "pages/index/$0";

/* End of file routes.php */
/* Location: ./application/config/routes.php */