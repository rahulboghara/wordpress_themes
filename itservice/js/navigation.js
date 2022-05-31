(function() {
	function scrollY() {
		return window.pageYOffset || docElem.scrollTop;
	}

	function mobilecheck() {
		var check = false;
		(function(a) {
			if (/(android|ipad|playbook|silk|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) check = true
		})(navigator.userAgent || navigator.vendor || window.opera);
		return check;
	}

	var docElem = window.document.documentElement,
		transEndEventNames = {
			'WebkitTransition': 'webkitTransitionEnd',
			'MozTransition': 'transitionend',
			'OTransition': 'oTransitionEnd',
			'msTransition': 'MSTransitionEnd',
			'transition': 'transitionend'
		},
		transEndEventName = transEndEventNames[Modernizr.prefixed('transition')],
		docscroll = 0,
		clickevent = mobilecheck() ? 'touchstart' : 'click';

	var $main = jQuery('.wrapper'),
		$pages = $main.children('div.its-page'),
		animcursor = 1,
		pagesCount = $pages.length,
		current = 0,
		isAnimating = false,
		endCurrPage = false,
		endNextPage = false,
		animEndEventNames = {
			'WebkitAnimation': 'webkitAnimationEnd',
			'OAnimation': 'oAnimationEnd',
			'msAnimation': 'MSAnimationEnd',
			'animation': 'animationend'
		},
		animEndEventName = animEndEventNames[Modernizr.prefixed('animation')];

	function init() {

		// Scrollbars
		/*jQuery('.its-page').mCustomScrollbar({
			mouseWheel: {
				preventDefault: false},
			contentTouchScroll: false,
			documentTouchScroll: false,
			theme: 'rounded',
		});*/
		/*jQuery('.custom-scroll').mCustomScrollbar({theme: 'rounded'});*/


		var pageWrapper = document.getElementById('page'),
			container = pageWrapper.querySelector('.site-content'),
			contentWrapper = container.querySelector('.wrapper');

		function showMenu() {
			if (jQuery('.md-show').length>0) return;
			docscroll = scrollY();
			contentWrapper.style.top = docscroll * -1 + 'px';
			document.body.scrollTop = document.documentElement.scrollTop = 0;
			pageWrapper.classList.add('modalview');
			jQuery('#masthead').removeClass('firstPage');
			setTimeout(function() {
				pageWrapper.classList.add('animate');
			}, 25);
		}

		document.getElementById('masthead').addEventListener(clickevent, function(ev) {
			if (jQuery(ev.target).parents('.lang-link').length>0) return;
			if (jQuery('.md-show').length>0) {
				jQuery('.md-close').trigger('click');
				return;
			}
			ev.preventDefault();
			if (!pageWrapper.classList.contains('animate')) {
				showMenu();
			}
		});

		document.addEventListener(clickevent, function(ev) {
			if (jQuery('.md-show').length>0) return;
			if (pageWrapper.classList.contains('animate')) {
				var onEndTransFn = function(ev) {
					if (ev.target.className !== 'site-content' || ev.propertyName.indexOf('transform') == -1) return;
					this.removeEventListener(transEndEventName, onEndTransFn);
					pageWrapper.classList.remove('modalview');
					if (current == 0) {
						jQuery('#masthead').addClass('firstPage');
					} else {
						jQuery('#masthead').removeClass('firstPage');
					}
					document.body.scrollTop = document.documentElement.scrollTop = docscroll;
					contentWrapper.style.top = '0px';
				};
				pageWrapper.addEventListener(transEndEventName, onEndTransFn);
				pageWrapper.classList.remove('animate');
			}
		});

		$pages.each(function() {
			var $page = jQuery(this);
			$page.data('originalClassList', $page.attr('class'));
		});
		$pages.eq(current).addClass('its-page-current');

		var mc = new Hammer.Manager(document.getElementById('page'));
		mc.add(new Hammer.Swipe({direction: Hammer.DIRECTION_ALL, threshold: 0}));
		mc.on('swipedown', function(e) {
			nextPage(-1);
		});
		mc.on('swipeup', function(e) {
			nextPage(+1);
		});
		mc.on('swiperight', function(e) {
			if (jQuery(e.target).hasClass('slide') || jQuery(e.target).parents('.slide').length>0) return;
			showMenu();
		});
		window.addEventListener('wheel', function(e) {
			if (!pageWrapper.classList.contains('animate')) {
				if (e.deltaY>0) {
					nextPage(+1);
				} else {
					nextPage(-1);
				}
			}
		});

		

		jQuery('.menu a').click(function(e) {
			setPage(jQuery(this).data('page'));
		});

    var parts = window.location.href.split('#');
    if (parts.length == 2) {
      var idx = jQuery('a[href="#' + parts[1] + '"]').data('page');
			if (idx) setPage(idx);
    }
	}

	function setPage(idx) {
		current = idx - 1;
		jQuery('.its-page-current').removeClass('its-page-current');
		jQuery('.its-page-' + idx).addClass('its-page-current');
		if (current == 0) {
			jQuery('#masthead').addClass('firstPage');
		} else {
			jQuery('#masthead').removeClass('firstPage');
		}
	}

	function nextPage(offset) {
		if (jQuery('.md-show').length>0) return false;
		if (isAnimating) return false;

		var $currPage = $pages.eq(current);
		current += offset;
		if (current > pagesCount - 1) {
			current = pagesCount - 1;
			return;
		}
		if (current < 0) {
			current = 0;
			return;
		}
		if (current==0) {
			jQuery('#masthead').addClass('firstPage');
		} else {
			jQuery('#masthead').removeClass('firstPage');
		}

		isAnimating = true;

		var
			$nextPage = $pages.eq(current).addClass('its-page-current'),
			outClass = 'its-page-flipOutTop',
			inClass = 'its-page-flipInBottom';

		$currPage.addClass(outClass).on(animEndEventName, function() {
			$currPage.off(animEndEventName);
			endCurrPage = true;
			if (endNextPage) {
				onEndAnimation($currPage, $nextPage);
			}
		});

		$nextPage.addClass(inClass).on(animEndEventName, function() {
			$nextPage.off(animEndEventName);
			endNextPage = true;
			if (endCurrPage) {
				onEndAnimation($currPage, $nextPage);
			}
		});

	}

	function onEndAnimation($outpage, $inpage) {
		endCurrPage = false;
		endNextPage = false;
		resetPage($outpage, $inpage);
		isAnimating = false;
	}

	function resetPage($outpage, $inpage) {
		$outpage.attr('class', $outpage.data('originalClassList'));
		$inpage.attr('class', $inpage.data('originalClassList') + ' its-page-current');
	}

	init();
})();