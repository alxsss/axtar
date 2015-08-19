<?php use_helper('I18N', 'Global') ?>
<?php include_partial('search')?>
<div id="results_translate">
  <form name="translate" method="get" class="translate" action="search/translateword">
    <select name="source_lang" id="source_lang">
      <option value="az" selected="selected">Azeri</option>
      <option value="sq">Albanian</option>
      <option value="ar">Arabic</option>
      <option value="be">Belarusian</option>
      <option value="bg">Bulgarian</option>
      <option value="ca">Catalan</option>
      <option value="zh-CN">Chinese (Simplified)</option>
      <option value="zh-TW">Chinese (Traditional)</option>
      <option value="hr">Croatian</option>
      <option value="cs">Czech</option>
      <option value="da">Danish</option>
      <option value="nl">Dutch</option>
      <option value="en">English</option>
      <option value="et">Estonian</option>
      <option value="tl">Filipino</option>
      <option value="fi">Finnish</option>
      <option value="fr">French</option>
      <option value="gl">Galician</option>
      <option value="de">German</option>
      <option value="el">Greek</option>
      <option value="ht">Haitian Creole</option>
      <option value="iw">Hebrew</option>
      <option value="hi">Hindi</option>
      <option value="hu">Hungarian</option>
      <option value="is">Icelandic</option>
      <option value="id">Indonesian</option>
      <option value="ga">Irish</option>
      <option value="it">Italian</option>
      <option value="ja">Japanese</option>
      <option value="ko">Korean</option>
      <option value="lv">Latvian</option>
      <option value="lt">Lithuanian</option>
      <option value="mk">Macedonian</option>
      <option value="ms">Malay</option>
      <option value="mt">Maltese</option>
      <option value="no">Norwegian</option>
      <option value="fa">Persian</option>
      <option value="pl">Polish</option>
      <option value="pt">Portuguese</option>
      <option value="ro">Romanian</option>
      <option value="ru">Russian</option>
      <option value="sr">Serbian</option>
      <option value="sk">Slovak</option>
      <option value="sl">Slovenian</option>
      <option value="es">Spanish</option>
      <option value="sw">Swahili</option>
      <option value="sv">Swedish</option>
      <option value="th">Thai</option>
      <option value="tr">Turkish</option>
      <option value="uk">Ukrainian</option>
      <option value="vi">Vietnamese</option>
      <option value="cy">Welsh</option>
      <option value="yi">Yiddish</option>
    </select>
    <select name="target_lang" id="target_lang">
      <option value="az">Azeri</option>
      <option value="sq">Albanian</option>
      <option value="ar">Arabic</option>
      <option value="be">Belarusian</option>
      <option value="bg">Bulgarian</option>
      <option value="ca">Catalan</option>
      <option value="zh-CN">Chinese (Simplified)</option>
      <option value="zh-TW">Chinese (Traditional)</option>
      <option value="hr">Croatian</option>
      <option value="cs">Czech</option>
      <option value="da">Danish</option>
      <option value="nl">Dutch</option>
      <option value="en" selected="selected">English</option>
      <option value="et">Estonian</option>
      <option value="tl">Filipino</option>
      <option value="fi">Finnish</option>
      <option value="fr">French</option>
      <option value="gl">Galician</option>
      <option value="de">German</option>
      <option value="el">Greek</option>
      <option value="ht">Haitian Creole</option>
      <option value="iw">Hebrew</option>
      <option value="hi">Hindi</option>
      <option value="hu">Hungarian</option>
      <option value="is">Icelandic</option>
      <option value="id">Indonesian</option>
      <option value="ga">Irish</option>
      <option value="it">Italian</option>
      <option value="ja">Japanese</option>
      <option value="ko">Korean</option>
      <option value="lv">Latvian</option>
      <option value="lt">Lithuanian</option>
      <option value="mk">Macedonian</option>
      <option value="ms">Malay</option>
      <option value="mt">Maltese</option>
      <option value="no">Norwegian</option>
      <option value="fa">Persian</option>
      <option value="pl">Polish</option>
      <option value="pt">Portuguese</option>
      <option value="ro">Romanian</option>
      <option value="ru">Russian</option>
      <option value="sr">Serbian</option>
      <option value="sk">Slovak</option>
      <option value="sl">Slovenian</option>
      <option value="es">Spanish</option>
      <option value="sw">Swahili</option>
      <option value="sv">Swedish</option>
      <option value="th">Thai</option>
      <option value="tr">Turkish</option>
      <option value="uk">Ukrainian</option>
      <option value="vi">Vietnamese</option>
      <option value="cy">Welsh</option>
      <option value="yi">Yiddish</option>
    </select>
    <input type="submit" class="button"  value="<?php echo __('Translate')?>" id="submit">
    <textarea name="word" id="word" class="expand150 translate"></textarea>
  </form>
  <div id="translate">hhhhhhhh
  </div>
</div>
