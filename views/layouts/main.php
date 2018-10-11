<?php

/* @var $this \yii\web\View */
/* @var $content string */

//use app\widgets\Alert;
use yii\helpers\Html;
//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
//use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

	<div class="home">
                <?php if( Yii::$app->session->hasFlash('apartment_save_success') ): ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4><i class="icon fa fa-check"></i>Сохранено!</h4>
                        <?php echo Yii::$app->session->getFlash('apartment_save_success'); ?>
                    </div>
                <?php endif;?>
                <?php if( Yii::$app->session->hasFlash('apartment_save_failure') ): ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4><i class="icon fa fa-minus"></i>Не удалось!</h4>
                        <?php echo Yii::$app->session->getFlash('apartment_save_failure'); ?>
                    </div>
                <?php endif;?>
                <?php if( Yii::$app->session->hasFlash('apartment_update_success') ): ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4><i class="icon fa fa-check"></i>Обновлено!</h4>
                        <?php echo Yii::$app->session->getFlash('apartment_update_success'); ?>
                    </div>
                <?php endif;?>
                <?php if( Yii::$app->session->hasFlash('apartment_update_failure') ): ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4><i class="icon fa fa-minus"></i>Не удалось!</h4>
                        <?php echo Yii::$app->session->getFlash('apartment_update_failure'); ?>
                    </div>
                <?php endif;?>
                <?php if( Yii::$app->session->hasFlash('apartment_load_failure') ): ?>
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <?php echo Yii::$app->session->getFlash('apartment_load_failure'); ?>
                    </div>
                <?php endif;?>
		<header>
			<div class="header_logo">
				<a href="">
					<h1>Недвижимость</h1>
				</a>
			</div>
		</header>
		<div class="content">
			<div class="sbl">
				<div class="sbl_c">
					<div class="sbl_c_head">
						<a href="#" class="sbl_c_head_name"><i class="fas fa-user-circle"></i><span>Риелтор-321</span></a>
						<div class="sbl_c_head_splr">
							<ul>
                                                            <li><a href="<?=Url::toRoute(['apartment/index']);?>"><i class="fas fa-user-cog"></i><span>Профиль</span></a></li>
								<li><a href="<?=Url::toRoute(['site/about']);?>"><i class="fas fa-list-ol"></i><span>Добавленное</span></a></li>
								<!--<li><a href="<?//=Url::toRoute(['site/contact']);?>"><i class="fas fa-star"></i><span>Избранное</span></a></li>-->
                                                                <?php
                                                                if(Yii::$app->user->isGuest)  {
                                                                    ?>
                                                                    <li><a href="<?=Url::toRoute(['site/login']);?>"><i class="fas fa-sign-out-alt"></i><span>Войти</span></a></li>
                                                                    <?php
                                                                } else{
                                                                    ?>
                                                                    <li><a href="<?=Url::toRoute(['/site/logout']);?>" data-method="post"><i class="fas fa-sign-out-alt"></i><span>Выйти</span></a></li>
                                                                    <?php
                                                                }
                                                                ?>
							</ul>
						</div>
					</div>
					<div class="sbl_c_fltr">
						<div class="sbl_c_fltr_strt">
<!--							<select>
								<option>Пункт 1</option>
								<option>Пункт 2</option>
								<option>Пункт 3</option>
								<option>Пункт 4</option>
							</select>-->
						</div>
						<!-- <div class="sbl_c_fltr_strt clearfix">
							<div>
								<em>Улица</em>
								<select data-placeholder="Выберите улицу" class="sbl_c_fltr_strt_id" multiple tabindex="4">
									<option value=""></option>
									<option value="United States">United States</option>
									<option value="United Kingdom">United Kingdom</option>
									<option value="Afghanistan">Afghanistan</option>
									<option value="Aland Islands">Aland Islands</option>
									<option value="Albania">Albania</option>
									<option value="Algeria">Algeria</option>
								</select>
							</div>
						</div> -->
					</div>
				</div>
			</div>
			<div class="btn_toggle">
				<i class="fas fa-chevron-left"></i>
			</div>
			<div class="cnt">
                            <?= $content ?>
			</div>
		</div>
	</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
