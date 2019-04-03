/******************
script呼び出し時のパラメータを判定して変数として取得する(基本的にはベースURLを取得したい)
******************/
function getParams(){
    var url = document.location.href;
    if(url.match(/#/)){
        url = RegExp.leftContext;
    }
    if(url.match(/\?/)){
        var params = RegExp.rightContext;
    }else{
        return new Array();
    }
    var tmp = params.split('&amp;');
    var param = new Array();
    var tmp2, key, val;
    for(var i = 0; i < tmp.length; i++){
        tmp2 = new Array();
        key = '';
        val = '';

        tmp2 = tmp[i].split('=');
        key = tmp2[0];
        val = tmp2[1];
        param[key] = val;
    }
    return param;
}


/******************
指定urlにgetパラメータをつけて遷移
******************/
// function pageJump(parameter) {
// 	var uri = getParams();
// 	alert(uri['uri']);
// 	// location.href = uri.'';
// }
