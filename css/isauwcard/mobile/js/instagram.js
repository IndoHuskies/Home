// Instantiate an empty object.
var Instagram = {};

// Small object for holding important configuration data.
Instagram.Config = {
  clientID: 'a307c0d0dada4b77b974766d71b72e0e',
  apiHost: 'https://api.instagram.com'
};


// ************************
// ** Main Application Code
// ************************
var intervalID = setInterval(function(){
  var photoTemplate, resource;

  function init(){
    bindEventHandlers();
    photoTemplate = _.template($('#photo-template').html());
  }

  function toTemplate(photo){
    photo = {
      count: photo.likes.count,
      avatar: photo.user.profile_picture,
      username: photo.user.username,
      photo: photo.images.standard_resolution.url,
      caption: photo.caption.text,
      url: photo.link
    };

    return photoTemplate(photo);
  }

  function toScreen(photos){
    var photos_html = '';

    $.each(photos.data, function(index, photo){
      photos_html += toTemplate(photo);
    });

    $('div#insta1').append(photos_html);
  }

  function generateResource(tag){
    var config = Instagram.Config, url;

    if(typeof tag === 'undefined'){
      throw new Error("Resource requires a tag. Try searching for cats.");
    } else {
      // Make sure tag is a string, trim any trailing/leading whitespace and take only the first 
      // word, if there are multiple.
      tag = String(tag).trim().split(" ")[0];
    }

    url = config.apiHost + "/v1/tags/" + tag + "/media/recent?callback=?&client_id=" + config.clientID + "&count=5";

    return function(max_id){
      var next_page;
      if(typeof max_id === 'string' && max_id.trim() !== '') {
        next_page = url + "&max_id=" + max_id;
      }
      return next_page || url;
    };
  }

  function search(tag){
    resource = generateResource(tag);
    $('#photos-wrap *').remove();
    fetchPhotos();
  }

  function fetchPhotos(max_id){
    $.getJSON(resource(max_id), toScreen);
  }

  function bindEventHandlers(){
  
  }

  function showPhoto(p){
    $(p).fadeIn();
  }

  // Public API
  Instagram.App = {
    search: search,
    showPhoto: showPhoto,
    init: init
  };
}(), 1000);

$(function(){
  Instagram.App.init();
  
  // Start with a search on cats; we all love cats.
  Instagram.App.search('keraton2014');  
});

