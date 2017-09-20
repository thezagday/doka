<?php
include_once "header.php";
?>

<div class="container-fluid">
	<div class="row breadcrumb">
		<div class="col-md-12">
			<ol class="breadcrumb">
				<li>
					<a href="index.php">Главная</a>
				</li>
				<li class="active">Контакты</li>
			</ol>
		</div>
	</div>
</div>

<div class="container-fluid content contact-page">
	<br>
	<div class="row">
		<div class="col-md-12">
			<div class="row">	
				<div class="col-sm-6">
					<h2 class="roboto">Контакты</h2>
					<br>
					<p><b>Почтовый адрес:</b><br>
					225404, г. Барановичи, ул. Войкова 25А</p>
					<br>
					<p><b>Юридический адрес:</b><br>
					220073, г. Минск, ул. Одоевского 11</p>				 
					<br>
					<p><b>E-mail: </b>info@dokallc.by, satop@tut.by</p>
					<p><b>Телефоны: </b>+375(163) 45-33-32<br>
					<span style="margin-left:92px;"></span>+375(163) 45-33-48<br>
					<span style="margin-left:92px;"></span>+375(29) 307-30-74<br>
					<span style="margin-left:92px;"></span>+375(29) 820-30-10<br>
					<span style="margin-left:92px;"></span>+375(29) 650-50-18<br>
					</p>                   
					<br>  
					<p><b>Реквизиты:</b><br>                  
					р/с 3012250036018<br>            
					в ОАО «Белинвестбанк» 220002, г.Минск,<br>          
					пр-т Машерова, 29<br>        
					код банка: 153001739</p>              
					<br>
					<p><b>УНН </b>100163189</p>
					<p><b>ОКПО</b>14596344</p>
				</div>
				<div class="col-sm-6">
					<h2 class="roboto">Напишите нам</h2>
					<br>
					<form action="" method="POST" role="form" class="input-block">
		                <div class="form-group">
		                    <input type="text" value="" required class="form-control" name="fio" onkeyup="this.setAttribute('value', this.value);">
		                    <label class="font-light" for="fio">Ваше имя</label>
		                </div>
		                <div class="form-group">
		                    <input type="text" value="" required class="form-control phone-mask" pattern="\W\d{3} \W\d{2}\W \d{3}-\d{2}-\d{2}" name="phone" onkeyup="this.setAttribute('value', this.value);">
		                    <label class="font-light" for="phone">Номер телефона</label>
		                </div>
		                <div class="form-group">
		                    <input type="email" value="" required class="form-control" name="email" onkeyup="this.setAttribute('value', this.value);">
		                    <label class="font-light" for="email">Ваш e-mail</label>
		                </div>
		                <div class="form-group">
		                	<textarea name="message" value="" id="" class="form-control" cols="30" rows="10"  onkeyup="this.setAttribute('value', this.value);"></textarea>
		                	<label class="font-light" for="phone">Ваше сообщение</label>
		                </div>
		                <div class="form-group">
		                    <button type="submit" class="btn btn-primary font-bold">ОТПРАВИТЬ</button>
		                </div>
		            </form>
				</div>
			</div>
			<h2 class="roboto">Как нас найти</h2>
			<br>
		</div>
	</div>
	<div class="row map">
		<div class="map-wrapper">
			<div id="map"></div>
		</div>
	</div>
</div>

<?php
include_once "footer.php";
?>