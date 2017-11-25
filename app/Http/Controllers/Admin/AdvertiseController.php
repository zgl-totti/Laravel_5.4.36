<?php
namespace App\Http\Controllers\Admin;

class AdvertiseController extends BaseController{
    public function index(){
        return view('admin.advertise.index');
    }




























    public function index_(){
        $this->display();
    }

    public function add_()
    {
        if (IS_AJAX) {
            $ad = D('Ad');
            $data = $ad->create();
            if ($data) {
                $data['addtime']=strtotime($data['addtime']);
                $data['overtime']=strtotime($data['overtime']);
                $aid = $ad->add($data);
                if ($aid) {
                    session('lastAid', $aid);
                    $this->success('广告添加成功');
                } else {
                    $this->error('广告添加失败');
                };
            } else {
                $this->error($ad->getError());
            }
        } else {
            $this->display('add');
        }
    }
    public function uploadAdPic(){
        $common=A('Common');
        $info=$common->uploadPic();
        if(is_array($info)){
            $where['id']=session('lastAid');
            $data['images']=$info['file']['savepath'].$info['file']['savename'];
            M('Ad')->where($where)->save($data);
            $this->error($info);
        }else{
            $this->error($info);
        }
    }

    public function AdminList_(){
        //搜索框
        $where='';
        if(isset($_GET['content'])&&$_GET['content']) {
            $content = I('get.content');
            $where['content'] = array('like', "%$content%");
        }if(isset($_GET['time'])&&$_GET['time']){
            $time = I('get.time');
            $where['addtime']=array('elt',strtotime(I('get.time')));
            $where['overtime'] = array('egt', strtotime(I('get.time')));
        }
        $ad=D('Ad');
        $ad->execute('set names utf8');
        $count = $ad->where($where)->count();
        $limitRows=5;
        $page = new \Org\Yh\AjaxPage($count, $limitRows,"search");
        $page->setConfig('prev', '上一页');
        $page->setConfig('next', '下一页');
        $show = $page->show();
        $list = $ad->where($where)->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign('page', $show);
        $this->assign('list', $list);
        $this->assign('count', $count);
        $this->assign('firstRow', $page->firstRow);
        $this->assign('content', $content);
        $this->assign('time', $time);

        if(IS_AJAX){
            $this->display('result');
        }else{
            $this->display('AdminList');
        }
    }
    public function edit_(){
        $ad = M('Ad');
        if (IS_AJAX) {
            if ($data = $ad->create()) {
                $data['addtime'] = strtotime("{$data['addtime']}");
                $data['overtime'] = strtotime("{$data['overtime']}");
                $data['content'] = I('post.content');
                $data['title'] = I('post.title');
                //更新活动信息
                if ($ad->field('addtime,overtime,content,location,title')->where(array('id'=>I('post.iid')))->save($data)) {
                    //更新图片

                    if ($_FILES) {
                        $upload = A('Common')->uploadPic();
//                        print_r($upload);
//                exit;
                        foreach ($upload as $key => $v) {
                                //更新主图
                                $data['images']=$v['savepath'].$v['savename'];
                                if ($ad->where(array('id'=>I('post.iid')))->field('images')->save($data)) {

                                } else {
                                    $this->error('主图更新失败');
                                }
                            }
                    }
                    $this->success('广告更新成功');
                } else {
                    $this->error($ad->getError());
                }
            }else{
                $this->error($ad->getError());
            }
        } else {
            //获取广告信息
            $aid=I('get.id');
            $info=M('Ad')->where(array('id'=>$aid))->find();
            //dump($info);
            $this->assign('info',$info);
            $this->display();
        }


    }

    public function del_(){
            $where['id']=$_POST['id'];
            $ad=M('Ad');
            $num=$ad->where($where)->delete();
            if($num>0){
                $this->success('删除成功');
            }else{
                $this->error('删除失败');
            }
        }
    public function show_(){
        $where['id']=$_POST['id'];
        $ad=M('Ad');
        //查询状态
        $status=$ad->where($where)->getField('status');
        $location=I('post.location');
        $count=M('Ad')->where(array('location'=>$location,'status'=>1))->count();
        if($status){
            if($count>1){
                $data['status']=0;//关闭
                $num=$ad->where($where)->save($data);
                $msg='下架成功';
                $msg1='下架失败';
            }else{
                $num=0;
                $msg1='最少要有一张广告';
                $msg='';
            }
        }else{
            $data['status']=1;//开启
            $num=$ad->where($where)->save($data);
            $msg='展示成功';
            $msg1='展示失败';
        }
        if($num>0){
            $this->success($msg);
        }else{
            $this->error($msg1);
        }
    }
    public function adOut_(){
        vendor('PHPExcel.PHPExcel');
        $objPHPExcel=new \PHPExcel();
        $filename=date("Y-m-d-H-i-s").".xlsx";
        $objSheet=$objPHPExcel->getActiveSheet();
        $objSheet->setTitle("demo");
        $objSheet->getStyle('A:F')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objSheet->getStyle('A:F')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objSheet->getColumnDimension('A')->setWidth(25);
        $objSheet->getColumnDimension('B')->setWidth(25);
        $objSheet->getColumnDimension('C')->setWidth(10);
        $objSheet->getColumnDimension('D')->setWidth(40);
        $objSheet->getColumnDimension('E')->setWidth(40);
        $objSheet->getColumnDimension('F')->setWidth(20);
        $objSheet->getColumnDimension('G')->setWidth(10);
        $objSheet->getStyle('A1:F1')->getFont()->setBold(true);
            $objSheet->setCellValue("A1","开始时间")->setCellValue("B1","结束时间")->setCellValue("C1","广告状态")->setCellValue("D1","广告内容")->setCellValue("E1","图片")->setCellValue("F1","商城头条标题")->setCellValue("G1","广告位置");
        $goods=M("Ad");
        $goodsInfo=$goods->field("addtime,overtime,status,content,images,title,location")->select();
        $j=2;
        foreach($goodsInfo as $k=>$v){
            $objSheet->setCellValue("A".$j,$v['addtime'])->setCellValue("B".$j,$v['overtime'])->setCellValue("C".$j,$v['status'])->setCellValue("D".$j,$v['content'])->setCellValue("E".$j,$v['images'])->setCellValue("F".$j,$v['title'])->setCellValue("G".$j,$v['location']);
            $j++;
        }
        ob_end_clean();//清除缓冲区,避免乱码
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename='.$filename);
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        //$objWriter->save('./File'.$filename);
    }
}