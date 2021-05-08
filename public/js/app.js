
function MoveCheck() {
    if( confirm("投稿してよろしいですか？") ) {
      return ture;
    }
    else {
        alert("キャンセルしました");
        return false;
    }
}
