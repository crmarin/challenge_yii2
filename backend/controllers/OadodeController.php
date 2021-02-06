<?php

namespace backend\controllers;

use Yii;
use backend\models\Oadode;
use backend\models\OadodeSearch;
use Exception;
use Spatie\Browsershot\Browsershot;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\web\HttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * OadodeController implements the CRUD actions for Oadode model.
 */
class OadodeController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Oadode models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OadodeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Oadode model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Displays a single Oadode model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionViewPdf($id)
    {
        $model = $this->findModel($id);

        $html_content = "<!DOCTYPE html>";
        $html_content .= "<html lang='en'>";
        $html_content .= "<head><meta http-equiv='content-type' content='text/html;charset=utf-8'>";

        $html_content .= "<style>";
        $html_content .= file_get_contents(Url::to('@webroot/css/pdf.css'));
        // $html_content .= file_get_contents(Url::to('@webroot/bootstrap.min.css'));
        // $html_content .= file_get_contents(Url::to('@webroot/bootstrap-theme.min.css'));
        $html_content .= "</style>";


        $html_content .= "</head>";
        $html_content .= "<body>";
        $html_content .= $this->renderPartial('/oadode/view_html.php', ['model' => $model]);
        $html_content .= "</body>";
        $html_content .= "</html>";

        $report_name = 'Oadode_' . $id;

        $file_html = Url::to('@webroot/tmp/' . $report_name . '.html');
        $file_pdf = Url::to('@webroot/tmp/' . $report_name . '.pdf');

        if (file_put_contents($file_html, $html_content) === false) {
            throw new HttpException(500, 'Error try html');
        }

        $top = 10;
        $right = 10;
        $bottom = 5;
        $left = 10;

        Browsershot::html($html_content)
            ->setNodeBinary('/usr/bin/node')
            ->setNpmBinary('/usr/bin/npm')
            ->noSandbox(true)
            ->format('Letter')
            ->margins($top, $right, $bottom, $left)
            ->showBackground()
            ->emulateMedia('screen')
            ->save($file_pdf);

        if (file_exists($file_pdf) === false) {
            throw new HttpException(500, 'error try pdf');
        } else {
            header("Content-Disposition: attachment; filename=" . $report_name . ".pdf");
            header("Content-Type: application/pdf");
            readfile($file_pdf);
        }

        readfile($file_html);
        exit;
    }

    /**
     * Creates a new Oadode model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Oadode();

        if ($model->load(Yii::$app->request->post())) {


            $transaction = Yii::$app->db->beginTransaction();

            try {

                $model->business_title = implode(", ", Yii::$app->request->post()['Oadode']['business_title']);;

                // $model->user_id = \Yii::$app->user->id;
                $model->user_id = 1;

                if (!$model->validate()) {
                    Yii::$app->response->format = Response::FORMAT_JSON;
                    return ActiveForm::validate($model);
                }

                if ($model->save()) {

                    $transaction->commit();
                    return $this->redirect(['index']);
                } else {
                    $transaction->rollBack();
                    throw new HttpException(401, 'Something wrong');
                }
            } catch (Exception $e) {

                $transaction->rollBack();
                throw $e;
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Oadode model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionEdit($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('edit', [
            'model' => $model,
        ]);
    }

    /**
     * Finds the Oadode model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Oadode the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Oadode::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
