// JavaScript Document
(function ($) {
	$.fn.floating = function (method) {
		var initialize = {};
		var methods = {
			init: function () {
				methods.destroy.apply(this);
				methods.update.apply(this, initialize);
			},
			destroy: function () {
				$(this).find(".parts-floating").remove();
			},
			update: function (obj) {
				var $html = $("<div/>");
				var $ul = $("<ul/>");
				methods.destroy.apply(this);
				if (initialize.state || initialize.moveState) {
					$html.addClass("parts-floating");
					$html.attr("data-position", initialize.position);
					$html.attr("data-theme", initialize.theme);
					$html.attr("data-size", initialize.size);
					$html.attr("data-state", initialize.state);
					$html.attr("data-moveState", initialize.moveState);
					$.each(initialize.account, function (index, obj) {
						var $li_html = $("<li/>");
						if (obj.url) {
							$li_html.append(
								'<a href="' +
								obj.url +
								'" target="_blank"><span class="iconfont"></span></a>'
							);
						} else {
							$li_html.append('<span class="iconfont"></span>');
						}
						if (obj.test) {
							$li_html.attr("title", obj.test);
						}
						if (obj.tip) {
							var url = /http(s)?:\/\/([\w-]+\.)+[\w-]+(\/[\w- .\/?%&=]*)?/;
							var objExp = new RegExp(url);
							if (objExp.test(obj.tip)) {
								url = '<img src="' + obj.tip + '">';
							} else {
								url = obj.tip;
							}
							$li_html.append(
								'<div class="tooltip parts-li-tip"><div class="tooltip-inner">' +
								url +
								"</div></div>"
							);
						}
						$li_html.attr("data-type", obj.type);
						if (obj.type == "Top") {
							$li_html.click(function () {
								$("body,html,nav.top_nav ~ .section").animate(
									{ scrollTop: 0 },
									500
								);
							});
						}
						$li_html.appendTo($ul);
					});
					$.each(initialize.tip, function (name, obj) {
						$ul.find(".parts-li-tip .tooltip-inner").css(name, obj);
					});
					$ul.appendTo($html);
					$(this).append($html);
				}
			},
		};
		if (methods[method]) {
			return methods[method].apply(
				this,
				Array.prototype.slice.call(arguments, 1)
			);
		} else if (typeof method === "object" || !method) {
			initialize = $.extend(initialize, method);
			return methods.init.apply(this, initialize);
		}
	};
})(jQuery);

$(document).ready(function () {
	var $miaobian = $(".Xcontent08>div");
	var $huantu = $(".Xcontent06>img");
	var $miaobian1 = $(".Xcontent26>div");

	$miaobian.mousemove(function () {
		miaobian(this);
	});
	$miaobian1.click(function () {
		miaobian1(this);
	});
	function miaobian(thisMb) {
		for (var i = 0; i < $miaobian.length; i++) {
			$miaobian[i].style.borderColor = "#dedede";
		}
		thisMb.style.borderColor = "#cd2426";

		$huantu[0].src = thisMb.children[0].src;
	}
	function miaobian1(thisMb1) {
		for (var i = 0; i < $miaobian1.length; i++) {
			$miaobian1[i].style.borderColor = "#dedede";
		}
		//		thisMb.style.borderColor = '#cd2426';
		$miaobian.css("border-color", "#dedede");
		thisMb1.style.borderColor = "#cd2426";
		$huantu[0].src = thisMb1.children[0].src;
	}
	$(".Xcontent33").click(function () {
		var value = parseInt($(".input").val()) + 1;
		$(".input").val(value);
	});

	$(".Xcontent32").click(function () {
		var num = $(".input").val();
		if (num > 0) {
			$(".input").val(num - 1);
		}
	});

	let banners = $("[data-role='banner']");
	if (banners.length > 0) {
		$(banners).each(function (index, banner) {
			if (isMobile()) {
				console.log('mobile');
				let mobileImage = $(banner).attr("data-mobile-image");
				console.log(mobileImage);
				if (mobileImage) {
					$(banner).css("background-image", 'url(' + mobileImage + ')');
				}
			} else {
				console.log('pc');
			}
		})
	}
});



function isMobile() {
	var currentWidth = window.innerWidth;
	if (currentWidth < 740)
		return true;
	else return false;
}

// wait for an element to exist
function waitForElement(selector) {
	return new Promise(resolve => {
		if (document.querySelector(selector)) {
			return resolve(document.querySelector(selector));
		}

		const observer = new MutationObserver(mutations => {
			if (document.querySelector(selector)) {
				resolve(document.querySelector(selector));
				observer.disconnect();
			}
		});

		observer.observe(document.body, {
			childList: true,
			subtree: true
		});
	});
}
