let div = document.getElementById('wrapper');
let key_ids = [];
let password;
div.onclick = function(event) {
  let target = event.target; // где был клик
  if(target.className == 'get-pass'){
    password = key_ids.join('r');
    console.log(password)
    $.ajax({
        type: 'POST',
        url: 'register.php',
        data: {password:password},
     success: function(data) {

     }
    return password;
  }

  if (target.className != 'g-key'){
    return;
  }

  target.style.background = '#f64a16';
  let id = target.id;
  key_ids.push(id)
};
