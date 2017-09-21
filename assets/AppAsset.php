<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'bootstrap/css/bootstrap.min.css',
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css',
//        'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
        'plugins/datatables/dataTables.bootstrap.css',
        'dist/css/AdminLTE.min.css',
        'dist/css/skins/_all-skins.min.css',
       // 'plugins/select2/select2.min.css',
       // 'plugins/fullcalendar/fullcalendar.min.css',
       // 'plugins/fullcalendar/fullcalendar.print.css',
    ];
    public $js = [
// mengganggu fungsi search       'plugins/jQuery/jQuery-2.1.4.min.js', 
        'bootstrap/js/bootstrap.min.js',
        'plugins/datatables/jquery.dataTables.min.js',
        'plugins/datatables/dataTables.bootstrap.min.js',
        // 'plugins/slimScroll/jquery.slimscroll.min.js',
        // 'plugins/fastclick/fastclick.min.js',
        'dist/js/app.min.js',
//        'dist/js/demo.js',
        // 'plugins/select2/select2.full.min.js',
        // 'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js',
        // 'plugins/fullcalendar/fullcalendar.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
