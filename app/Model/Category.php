<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Input;

class Category extends Model
{

    //
    protected $table = 'category';


    protected $fillable = [
        'name',
    ];

    static $catData = [
        0 => '顶级分类',
    ];

    static $category = [];


    public $html;

    /**
     * 获取分类列表
     * @return mixed
     */
    public static function getCategoryDataModel()
    {
        $category = self::all();
        $data = tree($category);
        return $data;
    }

    /**
     * 此方法维护静态数组 $category
     */
    private static function getCategoryArr($catId)
    {
        if (!isset(self::$category[$catId])) {
            $cate = self::select('name')->find($catId);
            if (empty($cate)) {
                return false;
            }
            self::$category[$catId] = $cate->name;
        }
        return self::$category[$catId];
    }

    public static function getCategoryNameByCatId($catId)
    {
        $cate = self::getCategoryArr($catId);
        return !empty($cate) ? $cate : '分类不存在';
    }

    /**
     * 根据别名取分类信息
     * @param $asName
     * @return mixed
     */
    public static function getCatInfoModelByAsName($asName)
    {
        return self::where('name', '=', $asName)->first();
    }
}
