<volist name="log" id="vallog">
    <li style="padding:0 5px;background: rgb(217,64,82);margin: 10px 20px;width: 260px;color: #fff;height: 25px;line-height: 25px;text-align: center">
        <span style="float: left;">{$vallog['minfo']['username']}</span>
        <span>{$vallog['prize']}</span>
        <span style="float: right;">{:date('Y-m-d H:i:s',$vallog['addtime'])}</span>
    </li>
</volist>