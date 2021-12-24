<?php
  //echo $_GET['bg']; 
?>
<style type="text/css">
@font-face {
    font-family: 'UTM Loko';
    src: url('templates/site/fonts/UTM Loko.ttf');
}
*{ box-sizing: border-box; }
  .lasotuvi{
          width:674px;
          height:970px;
          margin: 50px auto;
          margin-bottom: 0px;
          font-size:11px;
          /*background: url('templates/site/laso/bg_laso/<?php echo $GLOBALS['backgroundLaSo']; ?>'), url(templates/site/laso/bg_laso/laso.png) no-repeat top left;*/
          box-sizing: content-box !important;
       }
  #lasotuvi    .cung{
        width:150px;
        height:220px;
        float:left;
        position: relative;
        padding:10px 5px;
        box-sizing: content-box !important;
      }
  #lasotuvi    .cung_1,.cung_2,.cung_7,.cung_8{
        width:162px;
        float:left;
        box-sizing: content-box !important;
        font-weight: bold;
      }
  /*hh*/
  #lasotuvi   .cung_3, .cung_12{height: 212px!important;font-weight: bold;}
  #lasotuvi   .cung_2, .cung_1{height: 211px!important;font-weight: bold;}

  /*end hh*/
      
  #lasotuvi    .cung p{
        margin:0px;
        padding:0px;
      }
      
  #lasotuvi    .cung ul li{
        line-height:15px;
      }
      
  #lasotuvi    .group_cung{
        width:180px;
        float:left;
      }
  #lasotuvi    .trung_tam_tu_vi{
        width:362px;
        height:480px;
        float:left;
        border:1px solid #ccc;
        border-width:1px 1px 0px 0px;
        
      }
  #lasotuvi    .trung_tam_tu_vi h1{
        text-align: center;
      }
      
  #lasotuvi    .trung_tam_tu_vi table{
        border-collapse: collapse;
        width:100%;
      }
  #lasotuvi    .trung_tam_tu_vi table td{
        padding:5px 0px 5px 10px;
      }
  #lasotuvi    .trung_tam_tu_vi table td:first-child{
        width:110px;
      }
  #lasotuvi    .trung_tam_tu_vi table td label{
        display: block;
        padding:0px 0px 0px 25px;
        font-weight:bold;
      }
  #lasotuvi    .trung_tam_tu_vi table tr td:last-child{
        color:#387ABF;
      }
  #lasotuvi    .cung ul{
        width: 50%;
        float:left;
        list-style:none;
        margin: 0px;
        padding:0px;
        font-size: 10px;
      }
  #lasotuvi    .cung ul li{
        padding: 0px 0px 0px 5px;
      }
  #lasotuvi    .cung p{
        text-align: center;
        font-weight:bold;
      }
      #lasotuvi .trungtam_bot {
        margin-left: 77px;
        font-weight: 700;
        font-style: italic;
      }
  /*#lasotuvi    .triet{
            position: absolute;
            display: block;
            background-color: #000;
            color: #fff;
            padding: 2px 20px;
            z-index: 999;
      }
  #lasotuvi    .triet1{
         top: 223px;
         left: -32px;
      }
  #lasotuvi    .triet2{
        top: 223px;
         left: -32px;
      }
  #lasotuvi#lasotuvi    .triet3{
           top: 220px;
           right: -26px;
      }
  #lasotuvi    .triet4{
          top: 230px;
          left: 60px;
      }
  #lasotuvi    .triet5{
          top: 230px;
          left: 60px;
      }
  #lasotuvi    .triet6{
          top: 230px;
          left: 60px;
      }
  #lasotuvi    .triet7{
          top: 230px;
          left: 60px;
      }
  #lasotuvi    .triet8{
          top: 230px;
          left: 60px;
      }
  #lasotuvi    .triet9{
          top: 230px;
          left: 60px;
      }
  #lasotuvi    .triet10{
          top: 230px;
          left: 60px;
      }
  #lasotuvi    .triet11{
          top: 230px;
          left: 60px;
      }
  #lasotuvi    .triet12{
          top: 223px;
          left: -32px;
      }*/
  #lasotuvi    .tieu_han{
         position: absolute;
         bottom: 10px;
         left:10px;
      }
  /*hh*/
   #lasotuvi    .truong_sinh{
        position: absolute;
        bottom: 10px;
        left: 19%;
        text-align: center;
        width: 50%;
        font-weight: bold;
      }
  .box_content table .trungtam_ct{
    padding-left: 12px;
  }
  #lasotuvi  table {
    font-size: 14px;
  }
   #lasotuvi    .cung .sao_right{
        float: right;
      }
   #lasotuvi    .c_giap{
        font-size: 10px;width: 40%;position: absolute;top:20px;
      }

  /*end hh*/
  #lasotuvi    .daihan{
        position: absolute;
        top: 20px;
        right:5px;
        font-size: 10px;
      }
  #lasotuvi    .han_thang{
        position: absolute;
        bottom: 10px;
        right:10px;
      }

#lasotuvi .laso_control{
    text-align: center;
}
#lasotuvi .laso_control button, .laso_control a{
    background: #A28F58;
    border: 1px solid #A28E53;
    color: #fff;
    padding: 5px 15px;
    text-decoration: none;
    font-weight: bold;
    cursor: pointer;
}
#lasotuvi .laso_control button:hover, .laso_control a:hover{
   background:#80765A;
}
#lasotuvi .color_1{
    color:#000;font-weight: bold;
}
#lasotuvi .color_2{
    color:#009900;font-weight: bold;
}
#lasotuvi .color_3{
    color:#FF0531;font-weight: bold;
}
#lasotuvi .color_4{
    color:#C79E00;font-weight: bold;
}
#lasotuvi .color_5{
    color:#999;font-weight: bold;
}
#lasotuvi .tuan_triet{
            position: absolute;
            display: block;
            background-color: #000;
            color: #fff;
            padding: 2px 20px;
            z-index: 999;
      }
      #lasotuvi .triet1{
         top: 228px;
         left: -29px;
      }
      #lasotuvi .triet2{
        top: 223px;
         left: -32px;
      }
      #lasotuvi .triet3{
           top: -5px;
           left: 48px;
      }
      #lasotuvi .triet4{
          top: 230px;
          left: 60px;
      }
      #lasotuvi .triet5{
          top: -9px;
          left: 45px;
      }
      #lasotuvi .triet6{
          top: 230px;
          left: 60px;
      }
      #lasotuvi .triet7{
            top: 230px;
            left: 140px;
      }
      #lasotuvi .triet8{
          top: 230px;
          left: 60px;
      }
      #lasotuvi .triet9{
          top: 230px;
          /*left: 60px;*/
          left: 41px;
      }
      #lasotuvi .triet10{
          top: 230px;
          left: 60px;
      }
      #lasotuvi .triet11{
          top: 235px;
          left: 55px;
      }
      #lasotuvi .triet12{
          top: 223px;
          left: -32px;
      }
      #lasotuvi .tuantriet{
             width:80px; 
             padding: 2px 10px !important;
             /*left:40px !important; */
      }
      .noidung_lasotuvi  p{
          font-family: Arial;
          margin:5px 0;
          font-size: 14px;
      }
      .noidung_lasotuvi .heading_laso{
          text-transform: uppercase;
          font-weight: 700;
          color:#9e1618;
      }

      /*giaodien laso mobile thietke*/
        /*.cot_cung3_4_5_6{width: 162px;height: 960px;float: left;}*/
      /*.cot_cung1_2_tt_7_8{width: 349px;height: 960px;float: left;}*/
      /*.cot_cung9_10_11_12{width: 162px;height: 960px;float: left;}*/
      /*.ul_saoright{text-align:left;padding-left: 5px}*/
      /*#lasotuvi{background:  url('.base_url().'templates/site/laso/bg_laso/laso.png) no-repeat top left}*/
         #lasotuvi{background: url('templates/site/laso/bg_laso/laso.png') no-repeat top left;}

        
        .cot_cung3_4_5_6{width: 24%;height: 960px;float: left;}
        .cot_cung1_2_tt_7_8{width: 52%;height: 960px;float: left}
          .cot_trungtam{width: 100%;float: left;height: 482px;padding: 100px 0px 0px 50px;}
        .cot_cung9_10_11_12{width: 24%;height: 960px;float: left;}
        .ul_saoright{text-align:left;padding-left: 5px}
        .sao1{
          font-weight:bold!important;
          padding:2px 0px!important;
          font-size:14px!important;
          padding-left:5%!important;
          line-height:13px!important;
           margin-top:30px!important;
         }
        .sao2{
          font-weight:bold!important;
          padding:2px 0px!important;
          font-size:14px!important;
          padding-left:5%!important;
          line-height:13px!important;
        }
        .c_cung{text-transform:uppercase; position: absolute; top: 20px;width:70%;left: 22%;text-align:center; font-size: 10px;font-weight:bold;}
        @media only screen and (min-width :769px){
          .hidden_desktop{display: none;}
        }
        @media only screen and (max-width: 768px){

          .hidden_mobile{display: none;}
          .top_trungtam{text-align: center;padding-bottom: 30px}
          .titleLaso{font-family: 'UTM Loko';text-transform: uppercase;font-size: 20px;}
          .domainName{font-style: italic;font-size: 13px}
          .center_trungtam{padding-left: 30%;}
          .mb_color_hoten{color:#c01515;text-transform: uppercase;}

          .sao1{margin-top:5px!important;}

          .lasotuvi{width:100%!important;height:auto!important;box-sizing: content-box !important;margin:0px!important;padding:0px!important;}
          #lasotuvi{background: url('templates/site/laso/bg_laso/laso_mb.png') no-repeat center 350px;background-color: #faf7ec;padding:0px;margin:0px;font-size: 10px!important;margin:0!important;padding:0!important;display: flex;}
          #lasotuvi:after{clear: both;content: ""}
          #lasotuvi .cung ul{width: 100%;}

          #lasotuvi .tuan_triet{font-size: 10px;padding:2px 5px!important;width: unset!important}
          #lasotuvi .triet7{top:97%;left: 91%}
          #lasotuvi .triet1{top:97%;left: -15px}
          #lasotuvi .triet5{left: 40%}
          #lasotuvi .triet3{top:-3%;left: 40%}
          #lasotuvi .triet9,#lasotuvi .triet11{top:97%;left: 40%}
          #lasotuvi .triet9.tuan,#lasotuvi .triet5.tuan,#lasotuvi .triet3.tuan{left: 35%}
          #lasotuvi .triet7.tuan{width: 64px!important;left: 82%}
          #lasotuvi .triet1.tuan{width: 64px!important;left: -32px}


          #lasotuvi .cung_7, #lasotuvi .cung_1, #lasotuvi .cung_2{width: 50%!important}
          #lasotuvi .cung_8,  #lasotuvi .cung_1{width: 49%!important;border-right: 0px;}
          .cot_cung3_4_5_6{height: auto!important;border:1px solid #000;}
          .cot_cung1_2_tt_7_8{height: auto!important;border:1px solid #000;border-left: 0px}
          .cot_cung9_10_11_12{height: auto!important;border:1px solid #000;border-left: 0px}

          .cot_trungtam{border-top:1px solid #000; border-bottom:1px solid #000;font-size: 12px;padding-left:unset;padding-top:140px;}
          .cot_trungtam table tbody tr{line-height: 20px}
          .cot_trungtam table tbody tr td{font-size: 12px;display: contents;}
          .cot_trungtam table tbody tr td label{font-size: 12px;margin:0px!important;}
          .trungtam_bot{margin:0px!important;color:#c01515;padding-top: 30px}
          .trungtam_bot *{font-size: 12px}

          .cung_1{border-left: 1px solid #000}
          .cung_2{}
          .cung_{}
          .cung_3{}
          .cung_4{border-top:1px solid #000;border-bottom:1px solid #000;}
          .cung_5{border-top:1px solid #000;}
          .cung_6{}
          .cung_7{}
          .cung_8{border-left: 1px solid #000}
          .cung_9{}
          .cung_10{border-top:1px solid #000}
          .cung_11{border-top:1px solid #000;border-bottom:1px solid #000;}
          .cung_12{}

          #lasotuvi .cung_2, #lasotuvi .cung_3{height: 350px!important}
          #lasotuvi .cung_4, #lasotuvi .cung_5, #lasotuvi .cung_10, #lasotuvi .cung_11{height: 350px!important}
          
          .cung{width: 100%!important;height: 350px!important;padding:10px 0px 0px 0px!important;border-collapse: collapse;}
          .cot_trungtam{height: 723px!important;background-color: #e1b7316b!important;}

          .ul_saoright{text-align:unset;padding-left: unset;margin-top:8px!important;}
          .sao1, .sao2{text-align: left!important;font-size: 10px!important;line-height: 10px!important}
          .sao1 span, .sao2 span{font-size: 10px!important;}
          .sao_left li span, .sao_right li span, .sao_left li,  .sao_right li{font-size: 10px!important}

          .c_giap{width: 100%!important;position: unset!important;top: unset;left: unset;font-style: italic;color:green;text-align: center;font-weight: normal;}
          .c_cung{top: unset;left: unset;width: 80%;display:inline-block;position: unset!important;font-size: 9px;font-weight: 800;}
          .daihan{top:24px!important;color:#c01515;}

          #lasotuvi .tieu_han{width: 100%!important; position: absolute;bottom: 38px;left:unset;text-align:center;font-weight: bold;font-style: italic;font-size: 10px!important}
          #lasotuvi .truong_sinh{width: 100%;float:left;position: absolute;bottom:25px;left: 0;text-align:center;font-style: italic;font-size: 10px!important}
          #lasotuvi .han_thang{width: 100%!important; position: absolute;bottom: 10px;left: 0;text-align:center;font-weight: bold;font-style: italic; color:#c01515;font-size: 10px!important}

        }
        @media only screen and ( max-width: 613px ){
          .center_trungtam{padding-left: 20%;}
          #lasotuvi .cung_7, #lasotuvi .cung_1, #lasotuvi .cung_2{width: 49%!important}
          #lasotuvi .triet9.tuan,#lasotuvi .triet5.tuan,#lasotuvi .triet3.tuan{left: 30%}
          #lasotuvi .triet7.tuan{left: 78%}
        }
        @media only screen and ( max-width: 540px ){
          .c_cung{padding:0px;}
        }
        @media only screen and ( max-width: 515px ){
          .mb_color_hoten *{font-size: 10px!important;}
          #lasotuvi .triet7{left: 88%}
          #lasotuvi .triet5,#lasotuvi .triet3{left: 36%}
          #lasotuvi .triet9,#lasotuvi .triet11{left: 36%}
          #lasotuvi .triet9.tuan,#lasotuvi .triet5.tuan,#lasotuvi .triet3.tuan{left: 24%}
          .daihan{right:1px!important;}
          #lasotuvi .triet7.tuan{left: 73%}
        }
        @media only screen and ( max-width: 450px ){
          .center_trungtam{padding-left: 15%;}
          #lasotuvi .triet9.tuan,#lasotuvi .triet5.tuan,#lasotuvi .triet3.tuan{left: 19%}
        }
        @media only screen and ( max-width: 420px ){
          #lasotuvi .triet7{left: 85%}
          #lasotuvi .triet9.tuan,#lasotuvi .triet5.tuan,#lasotuvi .triet3.tuan{left: 15%}
          #lasotuvi .triet7.tuan{left: 68%}
        }
        @media only screen and ( max-width: 350px ){
          .center_trungtam{padding-left: 2%;}
          #lasotuvi .triet9.tuan,#lasotuvi .triet5.tuan,#lasotuvi .triet3.tuan{left: 7%}
          #lasotuvi .triet7.tuan{left: 60%}
        }
         @media only screen and ( max-width: 330px ){
          .center_trungtam{padding-left: 5px;}
          #lasotuvi .triet7{left: 80%}
          #lasotuvi .triet5,#lasotuvi .triet3{left: 28%}
          #lasotuvi .triet9,#lasotuvi .triet11{left: 28%}
          #lasotuvi .triet9.tuan,#lasotuvi .triet5.tuan,#lasotuvi .triet3.tuan{left: 3%}
        }
        @media only screen and ( max-width: 326px ){
          #lasotuvi .cung_8, #lasotuvi .cung_1{width: 48%!important}
        }
/*giaodien laso mobile thietke*/
</style>
