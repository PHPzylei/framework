<?php
//namespace frontend\controllers;
//
//use Yii;
//use yii\web\Controller;
//use common\models\Msg;
//
///**
// * ���Կ�����
// * @author phpopenfather
// */
//class MsgController extends Controller
//{
//    //������layout
//    public $layout = false;
//
//    //�б�
//    public function actionIndex()
//    {
//        #����1����ȡ���Ա�����
//        $msgs = Msg::find()->all();
//        #����2��������ͼ
//        return $this->render('index', compact('msgs'));
//    }

namespace frontend\controllers;

    use Yii;
    use yii\web\Controller;
    use common\models\Msg;

    /**
     * ���Կ�����
     * @author phpopenfather
     */
class MsgController extends Controller
{
    //������layout
    public $layout = false;

    //�ر�csrf����
    public $enableCsrfValidation = false;

    //�б�
    public function actionIndex()
    {
        #����1����ȡ���Ա�����
        $msgs = Msg::find()->all();
        #����2��������ͼ
        return $this->render('index', compact('msgs'));
    }

    //���
    public function actionAdd()
    {
        #����1���ж�����ʽ
        if (Yii::$app->request->isPost) {
            #����2����������
            $uname = Yii::$app->request->post('uname');
            $content = Yii::$app->request->post('content');
            #����3����������
            $msg = new Msg;
            $msg->uname = $uname;
            $msg->content = $content;
            $msg->created_at =  $msg->updated_at = time();
            $rs = $msg->save();
            #����4���ж���ת
            return $this->redirect(['/msg']);
        }
    }
}

/**
 * Created by PhpStorm.
 * User: zyl
 * Date: 2018/7/17
 * Time: 18:37
 */