<?php
/*
Plugin Name: HitMeter Counter
Plugin URI: http://hitmeter.ru
Description: Этот плагин помещает на страницы сайта код счетчика HitMeter - бесплатной системы статистики сайтов.
Author: HitMeter <support@hitmeter.ru>
Contributor: HitMeter <support@hitmeter.ru>
Author URI: http://hitmeter.ru
Version: 1.0
*/

/* Copyright 2012 HitMeter.ru (email : support@hitmeter.ru)
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/

if (!defined('ABSPATH')) die("do not execute directly");

function activate()
	{
 	add_option('hitmeter_id', '', 'Идентификатор счетчика');
 	add_option('hitmeter_type', '2_3', 'Тип счетчика');
 	add_option('hitmeter_pos', '1', 'Способ размещения счетчика');
 	add_option('hitmeter_widget_pos', 'left', 'Положение счетчика');
	}

function hitmeter_options_page() {?>
<div class="wrap">
 <h2>Настройки счетчика HitMeter</h2>
<?php
 if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
   // set the post formatting options
   update_option('hitmeter_id', $_POST['hitmeter_id']);
   update_option('hitmeter_type', $_POST['hitmeter_type']);
   update_option('hitmeter_pos', $_POST['hitmeter_pos']);
   echo '<div class="updated"><p>Настройки обновлены.</p></div>';
  }
 $hitmeter_id = trim(get_option('hitmeter_id'));
 $hitmeter_type = get_option('hitmeter_type');
 $hitmeter_pos = get_option('hitmeter_pos');
 if (!$hitmeter_id)
  {
?>
 <table width="100%" border="0" cellspacing="0" cellpadding="0" class="info">
   <tr>
     <td width="28" align="center" valign="middle"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>images/i.gif" width="22" height="21" /></td>
     <td align="left" style="padding-left: 0px">Система статистики сайтов HitMeter&nbsp;&ndash; простая, наглядная, и в то же время полная и профессиональная. Отчеты позволят увидеть откуда приходят посетители, какие страницы наиболее популярны, и многое другое.<br />Если Вы еще не зарегистрированы в системе бесплатной статистики сайтов HitMeter, <a href="http://hitmeter.ru/registration" target="_blank">сделайте это</a> сейчас.</td>
   </tr>
 </table>
<?php
  }
?>
 <link href="<?php echo plugin_dir_url( __FILE__ ) ?>styles.css" rel="stylesheet" type="text/css" />
 <form method="post">
 <div class="hm_step1">
  <div class="h_field">Укажите идентификатор счетчика:</div>
   <input name="hitmeter_id" type="text" value="<?php echo trim(htmlspecialchars($hitmeter_id)) ?>"><br />
   Идентификатор &ndash; это число, указанное под названием счетчика на <a href="http://hitmeter.ru/counters" target="_blank">странице счетчиков</a>
 </div>
 <div class="hm_step2">
   <div class="h_field">Выберите внешний вид счетчика:</div>
      <div class="ccode2">&mdash; в виде текстовой ссылки:</div>
        <div class="ccode3"><input name="hitmeter_type" type="radio" class="radio" value="2_3"<?php if($hitmeter_type == '2_3') echo ' checked="checked"' ?>>&nbsp;Статистика сайта собирается с помощью HitMeter</div>
        <div class="ccode3"><input name="hitmeter_type" type="radio" class="radio" value="2_4"<?php if($hitmeter_type == '2_4') echo ' checked="checked"' ?>>&nbsp;Подсчет посетителей ведется с помощью системы HitMeter</div>
        <div class="ccode3"><input name="hitmeter_type" type="radio" class="radio" value="2_1"<?php if($hitmeter_type == '2_1') echo ' checked="checked"' ?>>&nbsp;HitMeter - статистика посещений сайта</div>
        <div class="ccode3"><input name="hitmeter_type" type="radio" class="radio" value="2_2"<?php if($hitmeter_type == '2_2') echo ' checked="checked"' ?>>&nbsp;Счетчик HitMeter</div>
      <div class="ccode2">&mdash; или в виде кнопки:</div>
      <table width="" border="0" cellspacing="0" cellpadding="0" class="buttons">
        <tr valign="top">
          <td><input name="hitmeter_type" type="radio" class="radio" value="1_1"<?php if($hitmeter_type == '1_1') echo ' checked="checked"' ?>><img src="http://img.hitmeter.ru/counters/c1.gif" width="88" height="31" alt="HitMeter - статистика посещений сайта" border="0"></td>
          <td><input name="hitmeter_type" type="radio" class="radio" value="1_2"<?php if($hitmeter_type == '1_2') echo ' checked="checked"' ?>><img src="http://img.hitmeter.ru/counters/c2.gif" width="88" height="31" alt="HitMeter - статистика посещений сайта" border="0"></td>
          <td><input name="hitmeter_type" type="radio" class="radio" value="1_3"<?php if($hitmeter_type == '1_3') echo ' checked="checked"' ?>><img src="http://img.hitmeter.ru/counters/c3.gif" width="88" height="31" alt="HitMeter - статистика посещений сайта" border="0"></td>
          <td><input name="hitmeter_type" type="radio" class="radio" value="1_4"<?php if($hitmeter_type == '1_4') echo ' checked="checked"' ?>><img src="http://img.hitmeter.ru/counters/c4.gif" width="88" height="31" alt="HitMeter - статистика посещений сайта" border="0"></td>
        </tr>
        <tr valign="top">
          <td><input name="hitmeter_type" type="radio" class="radio" value="1_5"<?php if($hitmeter_type == '1_5') echo ' checked="checked"' ?>><img src="http://img.hitmeter.ru/counters/c5.gif" width="88" height="31" alt="HitMeter - статистика посещений сайта" border="0"></td>
          <td><input name="hitmeter_type" type="radio" class="radio" value="1_6"<?php if($hitmeter_type == '1_6') echo ' checked="checked"' ?>><img src="http://img.hitmeter.ru/counters/c6.gif" width="88" height="31" alt="HitMeter - статистика посещений сайта" border="0"></td>
          <td><input name="hitmeter_type" type="radio" class="radio" value="1_7"<?php if($hitmeter_type == '1_7') echo ' checked="checked"' ?>><img src="http://img.hitmeter.ru/counters/c7.gif" width="88" height="31" alt="HitMeter - статистика посещений сайта" border="0"></td>
          <td><input name="hitmeter_type" type="radio" class="radio" value="1_8"<?php if($hitmeter_type == '1_8') echo ' checked="checked"' ?>><img src="http://img.hitmeter.ru/counters/c8.gif" width="88" height="31" alt="HitMeter - статистика посещений сайта" border="0"></td>
        </tr>
      </table>
 </div>
 <div class="hm_step3">
   <div class="h_field">Способ размещения счетчика:</div>
     <div class="ccode3"><input name="hitmeter_pos" type="radio" class="radio" value="1"<?php if($hitmeter_pos == '1') echo ' checked="checked"' ?>>&nbsp;Автоматически поместить счетчик внизу страницы</div>
     <div class="ccode3"><input name="hitmeter_pos" type="radio" class="radio" value="2"<?php if($hitmeter_pos == '2') echo ' checked="checked"' ?>>&nbsp;Выбрать расположение счетчика используя виджет</div>
 </div>
			<input type="submit" id="hm_submit" value="Сохранить настройки" />
	</form>
 <div style="padding-top: 12px">Статистику сайта смотрите на <a href="http://hitmeter.ru/sites/" target="_blank">hitmeter.ru</a></div>
</div>
<?php
}

function hitmeter_show()
 {  $texts = array (1 => 'HitMeter - статистика посещений сайта', 2 => 'Счетчик HitMeter', 3 => 'Статистика сайта собирается с помощью HitMeter', 4 => 'Подсчет посетителей ведется с помощью системы HitMeter');
  $hitmeter_id = trim(get_option('hitmeter_id'));
  $hitmeter_type = trim(get_option('hitmeter_type'));
  $type1 = (int) substr ($hitmeter_type, 0, 1);
  $type2 = (int) substr ($hitmeter_type, 2);
  $text = isset ($texts[$type2]) ? $texts[$type2] : 'Счетчик HitMeter';
  $ins = ($type1 == 1) ? "<img src=\"http://img.hitmeter.ru/counters/c$type2.gif?counter=$hitmeter_id&phase=1\" width=\"88\" height=\"31\" alt=\"HitMeter - счетчик посетителей сайта, бесплатная статистика\" border=\"0\">" : $text;
  $code = "<script language=\"javascript\">
rand=Math.floor(Math.random()*Math.pow(10,16));
document.write(\"<script src='http://stat.hitmeter.ru/counter.js?counter=$hitmeter_id&phase=1&rand=\"+escape(rand)+\"&referer=\"+escape(document.referrer)+\"' type='text/javascript'></\" + \"script>\")
</script>\n<a href=\"http://hitmeter.ru\" target=\"_blank\">$ins</a>\n";
  echo $code;
 }

function hitmeter_add_menu() {
		add_options_page('HitMeter', 'HitMeter', 8, __FILE__, 'hitmeter_options_page');
}

function hitmeter_widget($args)
 { 	$hitmeter_pos = (int) trim(get_option('hitmeter_pos'));
 	if ($hitmeter_pos == 2)
 	 {
    $hitmeter_widget_pos = trim(get_option('hitmeter_widget_pos'));
    extract($args);
    echo $before_widget;
    echo "<div align=\"$hitmeter_widget_pos\">";
    hitmeter_show();
    echo "</div>";
    echo $after_widget;
   }
}

function hitmeter_widget_control()
 {
  if (!empty($_REQUEST['hitmeter_widget_pos']))
   {
    update_option('hitmeter_widget_pos', $_REQUEST['hitmeter_widget_pos']);
   }
  $hitmeter_widget_pos = trim(get_option('hitmeter_widget_pos'));
?>
Положение счетчика:<br />
<select size="1" name="hitmeter_widget_pos">
  <option value="left"<?php if($hitmeter_widget_pos == 'left') echo ' selected' ?>>слева</option>
  <option value="right"<?php if($hitmeter_widget_pos == 'right') echo ' selected' ?>>справа</option>
  <option value="center"<?php if($hitmeter_widget_pos == 'center') echo ' selected' ?>>по центру</option>
</select>
<?
 }

function register_hitmeter_widget() {
    wp_register_sidebar_widget('hitmeter', 'HitMeter', 'hitmeter_widget', array('description' => 'Отображение счетчика HitMeter'));
    register_widget_control('HitMeter', 'hitmeter_widget_control');
}

add_action('activate_hitmeter/hitmeter.php', 'activate');
add_action('admin_menu', 'hitmeter_add_menu');
get_option('hitmeter_pos') == 1 ? add_action('wp_footer', 'hitmeter_show') : remove_action('wp_footer', 'hitmeter_show');
add_action('init', 'register_hitmeter_widget');

?>