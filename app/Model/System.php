<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Auth, Input;

class System extends Model
{

    const SYSTEM_INFO_TYPE = 1;
    //
    protected $table = 'systems';

    public $timestamps = false;

    protected $fillable = array(
        'cate',
        'system_name',
        'system_value'
    );

    static $cate = [
        self::SYSTEM_INFO_TYPE => '基本设置',
    ];

    /**
     * 获取指定配置值
     * @param $field
     * @return mixed
     */
    public function getSystem($field)
    {
        return self::select('system_value')->where('system_name', $field)->pluck('system_value');
    }

    public static function getSystemSetting()
    {
        $result = array();
        $settings = self::where('cate',1)->get();

        foreach($settings as $item){
            array_push($result,array("k" => $item->system_name,"v" => $item->system_value));
        }

        return $result;
    }

    public static function setSystemValue($key,$val){
        $exist = self::select('system_value')->where('system_name', $key)->where("cate",System::SYSTEM_INFO_TYPE)->get();

        if(!$exist->isEmpty()){
            $data = array(
                "id" > $exist[0]->id,
                'cate' => System::SYSTEM_INFO_TYPE,
                'system_value' => $val,
            );
            self::update($data);
        }else{
            $data = array(
                'cate' => System::SYSTEM_INFO_TYPE,
                'system_name' => $key,
                'system_value' => $val,
            );
            self::create($data);
        }
    }

}
