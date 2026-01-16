/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/youtube-live.js":
/*!**************************************!*\
  !*** ./resources/js/youtube-live.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $('#player').hide();
  $('#play_vid').click(function () {
    $('#player').show();
    $('#play_vid').hide();
    $('.videoWrapper').removeClass('videoWrapper169');
  });
  loadPlayer();
});
var width, height;
$(window).resize(function () {
  imgSize();
});

function imgSize() {
  var img = document.getElementById('play_vid');
  width = img.clientWidth;
  height = img.clientHeight;
  var person = [];
  person["width"] = width;
  person["height"] = height;
  return person;
}

function getArtistId() {
  // return 'l-gQLqv9f4o';
  return 'yh7E2S0_iHQ';
}

function loadPlayer() {
  if (typeof YT == 'undefined' || typeof YT.Player == 'undefined') {
    var tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    window.onYouTubePlayerAPIReady = function () {
      onYouTubePlayer();
    };
  } else {
    onYouTubePlayer();
  }
}

var player;

function onYouTubePlayer() {
  player = new YT.Player('player', {
    height: imgSize()['height'],
    width: imgSize()['width'],
    videoId: getArtistId(),
    playerVars: {
      controls: 1,
      showinfo: 0,
      rel: 0,
      showsearch: 0,
      iv_load_policy: 3
    },
    events: {
      'onStateChange': onPlayerStateChange,
      'onError': catchError,
      'onReady': onPlayerReady
    }
  });
}

var done = false;

function onPlayerStateChange(event) {
  if (event.data == YT.PlayerState.PLAYING && !done) {
    // setTimeout(stopVideo, 6000);
    done = true;
  } else if (event.data == YT.PlayerState.ENDED) {
    location.reload();
  }
}

function onPlayerReady(event) {
  $('#play_vid').click(function () {
    event.target.playVideo();
  });
}

function catchError(event) {
  if (event.data == 100) console.log("Error loading");
}

function stopVideo() {
  player.stopVideo();
}

/***/ }),

/***/ 1:
/*!********************************************!*\
  !*** multi ./resources/js/youtube-live.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Repository\newlifecentre\proj-newlifecentre-site\resources\js\youtube-live.js */"./resources/js/youtube-live.js");


/***/ })

/******/ });