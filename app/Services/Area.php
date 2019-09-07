<?php


namespace app\common\service;



class Area
{
    public function area()
    {
        //获取路径
        $path = public_path('mobile/assets/js/area_array.json');
        //获取所有的数据，并变换字段名称
        $area = \App\Models\ChinaArea::where('type', '>', 0)
            ->select('id as area_id', 'name as area_name', 'parent_id')
            ->get()
            ->toArray();

        $tree = $this->make_tree($area);

        file_put_contents($path, json_encode($tree));
    }

    /*
     * 生成无限极分类树
     */
    protected function make_tree($arr)
    {
        $refer = array();
        $tree = array();
        foreach ($arr as $k => $v) {
            $refer[$v['area_id']] = &$arr[$k];  //创建主键的数组引用
        }

        foreach ($arr as $k => $v) {
            $parent_id = $v['parent_id'];   //获取当前分类的父级id
            if ($parent_id == 1) {
                $tree[] = &$arr[$k];    //顶级栏目
            } else {
                if (isset($refer[$parent_id])) {
                    $refer[$parent_id]['data'][] = &$arr[$k];    //如果存在父级栏目，则添加进父级栏目的子栏目数组中
                }
            }
        }

        return $tree;
    }
}