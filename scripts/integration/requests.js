FB.ui({method: 'apprequests',
  message: 'YOUR_MESSAGE_HERE'
}, function(response){
  console.log(response);
});
FB.ui({method: 'apprequests',
  message: 'YOUR_MESSAGE_HERE',
  to: 'USER_ID'
}, function(response){
  console.log(response);
});
FB.ui({method: 'apprequests',
  message: 'Friend Smash Request!',
  filters: [{name:'GROUP_1_NAME', user_ids:['USER_ID','USER_ID','USER_ID']},{name:'GROUP_2_NAME', user_ids: ['USER_ID','USER_ID','USER_ID']}]
}, function(response){
  console.log(response);
}});
