<?php
/*
BISMILLAAHIRRAHMAANIRRAHIIM - In the Name of Allah, Most Gracious, Most Merciful
================================================================================
filename 	: index.php
purpose  	: main application page
create   	: 20210210
last edit	: 20210309
author   	: cahya dsn
demo site 	: https://psycho.cahyadsn.com/mbti_test
soure code 	: https://github.com/cahyadsn/mbti_test
=====================================================
================================================================================
This program is free software; you can redistribute it and/or modify it under the
terms of the MIT License.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

See the MIT License for more details

copyright (c) 2021 by cahya dsn; cahyadsn@gmail.com
================================================================================*/
session_start();
include 'inc/config.php';
$c=isset($_SESSION['c'])?$_SESSION['c']:(isset($_GET['c'])?$_GET['c']:'indigo');
$page=isset($_SESSION['page'])?$_SESSION['page']:0;
$num_perpage=5;
$_SESSION['author'] = 'cahyadsn';
$_SESSION['ver']    = sha1(rand());
header('Expires: '.date('r'));
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
if(!isset($_SESSION['data_mbti'])){
$sql="SELECT * FROM mbti_test_statements ORDER BY rand()";
$result=$db->query($sql);
$data=array();
while($row=$result->fetch_object()) $data[]=$row;
	$_SESSION['data_mbti']=$data;
}else{
	$data=$_SESSION['data_mbti'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>MBTI Test</title>
        <meta charset="utf-8" />
        <meta http-equiv="expires" content="<?php echo date('r');?>" />
        <meta http-equiv="pragma" content="no-cache" />
        <meta http-equiv="cache-control" content="no-cache" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta http-equiv="content-language" content="en" />
        <meta name="author" content="Cahya DSN" />
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
        <meta name="keywords" content="MBTI, personality, test" />
        <meta name="description" content="MBTI (Myer Briggs Type Indicator) Personality Test ver <?php echo $version;?> created by cahya dsn" />
        <meta name="robots" content="index, follow" />
        <link rel="shortcut icon" href="<?php echo _ASSET;?>img/favicon.ico" type="image/x-icon">
        <!--link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script//-->
        <link rel="stylesheet" href="<?php echo _ASSET;?>css/w3.css">
        <link rel="stylesheet" href="<?php echo _ASSET;?>css/w3-theme-<?php echo $c;?>.css" media="all" id="mbti_css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <style>body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif} td.incomplete {color:red !important;}</style>
        <script src="<?php echo _ASSET;?>js/jquery.min.js"></script>
    </head>
    <body>
        <div class="w3-top">
            <div class="w3-bar w3-theme-d5">
                <span class="w3-bar-item"># MBTI v<?php echo $version;?></span>
                <a href="#" class="w3-bar-item w3-button">Home</a>
                <div class="w3-dropdown-hover">
                  <button class="w3-button">Themes</button>
                  <div class="w3-dropdown-content w3-white w3-card-4" id="theme">
                        <?php
                        $color=array("black","brown","pink","orange","amber","lime","green","teal","purple","indigo","blue","cyan");
                        foreach($color as $c){
                            echo "<a href='#' class='w3-bar-item w3-button w3-{$c} color' data-value='{$c}'> </a>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <div class="w3-container">
       <form action='result.php' method='post' id='mbti'>
        <input type="hidden" id="page" value="0">
        <div class="w3-card-4">
          <div class='w3-container'>
            <h2>&nbsp;</h2>
            <h2 class="w3-text-theme">Myer Briggs Type Indicator (MBTI) Test</h1>
            <div class="w3-row">
              <div class="w3-col s12">
                Di bawah ini ada 60 nomor isian. Masing-masing nomor memiliki dua pernyataan yang bertolak belakang (PERNYATAAN 1 & 2).<br>Pilihlah salah satu pernyataan yang paling sesuai dengan diri Anda dengan men-<i>check</i> pada isian pada kolom yang sudah disediakan (KOLOM PILIHAN).<br>Anda HARUS memilih salah satu yang dominan serta mengisi semua nomor.
              </div>
              <h6>&nbsp;</h6>
            </div>
            <div class="w3-row">
                <table class="w3-table w3-striped">
                  <thead>
                    <tr class="w3-theme-d3">
                      <th>No</th>
                      <th>Pilihan</th>
                      <th>Pernyataan</th>
                    </tr>
                  </thead>
                  <tbody id='p0'>
                    <?php
                    $no=0;
                    foreach($data as $d){
                      $c=rand()%2;
                      echo "
                        <tr style='border-top:solid 1px #999;'>
                          <td rowspan='2' style='width:30px !important;'>".++$no."</td>
                          <td style='padding-left:16px !important;width:30px !important;' class='incomplete'><input type='radio' name='d[{$d->id}]' value='1' class='w3-radio' ".(isset($_GET['auto'])?($c==0?'checked ':''):'')."required /></td>
                          <td class='right'>{$d->statement1}</td>
                        </tr>
                        <tr>
                          <td><input type='radio' name='d[{$d->id}]' value='2' class='w3-radio' ".(isset($_GET['auto'])?($c==1?'checked ':''):'')."required /></td>
                          <td>{$d->statement2}</td>
                        </tr>
                           ";
                      if($no%$num_perpage==0) {
                        echo "</tbody><tbody style='display:none' id='p".round($no/$num_perpage)."'>";
                      }
                    }
                    ?>
                  </tbody>
                </table>
            </div>
            <div class="w3-row">
              <h6>&nbsp;</h6>
              <div class="w3-col s2 w3-padding">
                <button class="w3-button w3-round-large w3-theme-d1 w3-margin-8 w3-disabled" id="btn_kembali" disabled>Kembali</button>
                <button class="w3-button w3-round-large w3-theme-d1 w3-margin-8" id="btn_lanjut">Lanjut</button>
              </div>
              <div class="w3-col s10 w3-padding">
                <input type='submit' value='kirim' id='btn_kirim' class='w3-button w3-round-large w3-theme-d1 w3-right w3-margin-8 w3-disabled' disabled/>
              </div>
            </div>
            <h6>&nbsp;</h6>
            <div><b>source code (v0.1) </b> : <a href='https://github.com/cahyadsn/mbti'>https://github.com/cahyadsn/mbti_test</a></div>
            <h2>&nbsp;</h2>
          </div>
        </div>
        </form>
    </div>
    <div class="w3-bottom">
        <div class="w3-bar w3-theme-d4 w3-center">
            MBTI Test v<?php echo $version;?> copyright &copy; 2021<?php echo (date('Y')>2021?date('-Y'):'');?> by <a href='mailto:cahyadsn@gmail.com'>cahya dsn</a><br />
        </div>
    </div>
    <div id="warning" class="w3-modal">
        <div class="w3-modal-content">
            <header class="w3-container w3-red">
                <span onclick="document.getElementById('warning').style.display='none'" class="w3-closebtn w3-hover-red w3-container w3-padding-8 w3-display-topright" title="Close Modal">&times;</span>
                <h2>Warning</h2>
            </header>
            <div class="w3-container">
                <p id='msg'></p>
            </div>
            <footer class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                <a href='#' onclick="document.getElementById('warning').style.display='none'" class="w3-button w3-grey">close</a>
            </footer>
        </div>
    </div>
    <script src="<?php echo _ASSET;?>js/mbti_test.v01.php?v=<?php echo md5(filemtime(_ASSET.'/js/mbti_test.v01.php'));?>"></script>
    </body>
</html>