<?php

namespace App\Http\Controllers\word;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\vanban;
use PhpOffice\PhpWord\TemplateProcessor;
use \Illuminate\Support\HtmlString;


class WordController extends Controller
{
    public function xmlEntities($str)
    {
       
        return $str;
    }
    public function exportworddoc($id)
    { 
        $docs=vanban::where(['Id_VanBan'=> $id])
        ->get();
        $html='';
        $fileName='';
        foreach($docs as $docdetail)
        {
            $content ='
            <!DOCTYPE html>
            <html lang="en">
            <head>
            <title>Bootstrap Example</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            </head>
            <body>  
                <div id="tieude" >
                    <div class="" style="margin-top: 0px;">
                            <div> <h4>BỘ GIÁO VÀ ĐÀO TẠO</h4></div>
                            <div id="tieudetruong"><h4>TRƯỜNG ĐẠI HỌC SƯ PHẠM HCM</h4></div>     
                            <div style=" margin-top: 15px;"><span>Số:  '.$docdetail->soVB.'/TB-DHQN</span></div>          
                    </div>
                    <div class="" style=" margin-left: 280px; margin-top: 0px;">
                            <div><h4>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</h4></div>
                            <div id="tieudedoclap"><h4>Độc Lập - Tự Do - Hạnh Phúc</h4></div>
                    </div>
                </div>
                <div id="tenvanban" style=" text-align: center;height: auto;width: 600px;margin-left: 100px;">
                    <h3>'.$docdetail->TenVanBan.'</h3>
                </div>
                <div class="container" style=" margin-top: 60px; height: auto;width: 820px;text-align: left;">
                    <p>
                    '.$docdetail->NoiDung.'
                    </p>
                </div>
                <div style="margin-left:500px;margin-top:50px">
                    <h4 style="margin-left:10px;">Người kí</h4>
                    <h4 style="margin-left:20px;">'.$docdetail->NhanVien->Ten.'</h4>
                    <h5 style="">'.$docdetail->NhanVien->Ho.' '.$docdetail->NhanVien->Ten.'</h5>
                </div>
            </body>
            </html>
            ';
                $fileName=$docdetail->TenVanBan;
            }
            $headers = array(
                "Content-type"=>"text/html",
                "Content-Disposition"=>"attachment;Filename=$fileName.doc"
        
            );
        return \Response::make($content,200, $headers);

        // $xml = array('&#34;','&#38;','&#38;','&#60;','&#62;','&#160;','&#161;','&#162;','&#163;','&#164;','&#165;','&#166;','&#167;','&#168;','&#169;','&#170;','&#171;','&#172;','&#173;','&#174;','&#175;','&#176;','&#177;','&#178;','&#179;','&#180;','&#181;','&#182;','&#183;','&#184;','&#185;','&#186;','&#187;','&#188;','&#189;','&#190;','&#191;','&#192;','&#193;','&#194;','&#195;','&#196;','&#197;','&#198;','&#199;','&#200;','&#201;','&#202;','&#203;','&#204;','&#205;','&#206;','&#207;','&#208;','&#209;','&#210;','&#211;','&#212;','&#213;','&#214;','&#215;','&#216;','&#217;','&#218;','&#219;','&#220;','&#221;','&#222;','&#223;','&#224;','&#225;','&#226;','&#227;','&#228;','&#229;','&#230;','&#231;','&#232;','&#233;','&#234;','&#235;','&#236;','&#237;','&#238;','&#239;','&#240;','&#241;','&#242;','&#243;','&#244;','&#245;','&#246;','&#247;','&#248;','&#249;','&#250;','&#251;','&#252;','&#253;','&#254;','&#255;');
        // $html = array('&quot;','&amp;','&amp;','&lt;','&gt;','&nbsp;','&iexcl;','&cent;','&pound;','&curren;','&yen;','&brvbar;','&sect;','&uml;','&copy;','&ordf;','&laquo;','&not;','&shy;','&reg;','&macr;','&deg;','&plusmn;','&sup2;','&sup3;','&acute;','&micro;','&para;','&middot;','&cedil;','&sup1;','&ordm;','&raquo;','&frac14;','&frac12;','&frac34;','&iquest;','&Agrave;','&Aacute;','&Acirc;','&Atilde;','&Auml;','&Aring;','&AElig;','&Ccedil;','&Egrave;','&Eacute;','&Ecirc;','&Euml;','&Igrave;','&Iacute;','&Icirc;','&Iuml;','&ETH;','&Ntilde;','&Ograve;','&Oacute;','&Ocirc;','&Otilde;','&Ouml;','&times;','&Oslash;','&Ugrave;','&Uacute;','&Ucirc;','&Uuml;','&Yacute;','&THORN;','&szlig;','&agrave;','&aacute;','&acirc;','&atilde;','&auml;','&aring;','&aelig;','&ccedil;','&egrave;','&eacute;','&ecirc;','&euml;','&igrave;','&iacute;','&icirc;','&iuml;','&eth;','&ntilde;','&ograve;','&oacute;','&ocirc;','&otilde;','&ouml;','&divide;','&oslash;','&ugrave;','&uacute;','&ucirc;','&uuml;','&yacute;','&thorn;','&yuml;');
        // $str = str_replace($html,$xml,$str);
        // $str = str_ireplace($html,$xml,$str);

        // $templateProcessor = new TemplateProcessor('word/document.docx');
        // $docs=vanban::where(['Id_VanBan'=> $id])
        // ->get();
        // $fileName='';
        // foreach($docs as $doc)
        // {
        //     $templateProcessor->setValue('sovb', $doc->soVB);
        //     $templateProcessor->setValue('ngay',\Carbon\Carbon::parse($doc ->Ngay )->format('d'));
        //     $templateProcessor->setValue('thang',\Carbon\Carbon::parse($doc ->Ngay )->format('m'));
        //     $templateProcessor->setValue('nam', \Carbon\Carbon::parse($doc ->Ngay )->format('Y'));
        //     $templateProcessor->setValue('nam', \Carbon\Carbon::parse($doc ->Ngay )->format('Y'));
        //     $templateProcessor->setValue('noidung',$parser->parse($doc->NoiDung));
        //     $templateProcessor->setValue('vanban', $doc->TenVanBan);
        //     $templateProcessor->setValue('ten', $doc->Id_NhanVien);
        //     $templateProcessor->setValue('hovaten', $doc->Id_NhanVien);
        //     $fileName = $doc->TenVanBan;           
        // }
        // header("Content-type: application/vnd.ms-word");
        // $templateProcessor->saveAs($fileName . '.docx');
        // return response()->download($fileName . '.docx')->deleteFileAfterSend(true);
    }
}
  