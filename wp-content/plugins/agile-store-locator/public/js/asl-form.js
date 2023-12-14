/*
 * Note that this is atoastr v2.1.3, the "latest" version in url has no more maintenance,
 * please go to https://cdnjs.com/libraries/atoastr.js and pick a certain version you want to use,
 * make sure you copy the url from the website since the url may change between versions.
 * */
window.atoastr=function(h){var v,t,C,w=0,n="error",o="info",i="success",a="warning",e={clear:function(e,t){var s=b();v||T(s);r(e,s,t)||function(e){for(var t=v.children(),s=t.length-1;0<=s;s--)r(h(t[s]),e)}(s)},remove:function(e){var t=b();v||T(t);if(e&&0===h(":focus",e).length)return void D(e);v.children().length&&v.remove()},error:function(e,t,s){return l({type:n,iconClass:b().iconClasses.error,message:e,optionsOverride:s,title:t})},getContainer:T,info:function(e,t,s){return l({type:o,iconClass:b().iconClasses.info,message:e,optionsOverride:s,title:t})},options:{},subscribe:function(e){t=e},success:function(e,t,s){return l({type:i,iconClass:b().iconClasses.success,message:e,optionsOverride:s,title:t})},version:"2.1.4",warning:function(e,t,s){return l({type:a,iconClass:b().iconClasses.warning,message:e,optionsOverride:s,title:t})}};return e;function T(e,t){return e||(e=b()),(v=h("#"+e.containerId)).length||t&&(s=e,(v=h("<div/>").attr("id",s.containerId).addClass(s.positionClass)).appendTo(h(s.target)),v=v),v;var s}function r(e,t,s){var n=!(!s||!s.force)&&s.force;return!(!e||!n&&0!==h(":focus",e).length)&&(e[t.hideMethod]({duration:t.hideDuration,easing:t.hideEasing,complete:function(){D(e)}}),!0)}function O(e){t&&t(e)}function l(t){var o=b(),e=t.iconClass||o.iconClass;if(void 0!==t.optionsOverride&&(o=h.extend(o,t.optionsOverride),e=t.optionsOverride.iconClass||e),!function(e,t){if(e.preventDuplicates){if(t.message===C)return!0;C=t.message}return!1}(o,t)){w++,v=T(o,!0);var i=null,a=h("<div/>"),s=h("<div/>"),n=h("<div/>"),r=h("<div/>"),l=h(o.closeHtml),c={intervalId:null,hideEta:null,maxHideTime:null},d={atoastId:w,state:"visible",startTime:new Date,options:o,map:t};return t.iconClass&&a.addClass(o.atoastClass).addClass(e),function(){if(t.title){var e=t.title;o.escapeHtml&&(e=u(t.title)),s.append(e).addClass(o.titleClass),a.append(s)}}(),function(){if(t.message){var e=t.message;o.escapeHtml&&(e=u(t.message)),n.append(e).addClass(o.messageClass),a.append(n)}}(),o.closeButton&&(l.addClass(o.closeClass).attr("role","button"),a.prepend(l)),o.progressBar&&(r.addClass(o.progressClass),a.prepend(r)),o.rtl&&a.addClass("rtl"),o.newestOnTop?v.prepend(a):v.append(a),function(){var e="";switch(t.iconClass){case"atoast-success":case"atoast-info":e="polite";break;default:e="assertive"}a.attr("aria-live",e)}(),a.hide(),a[o.showMethod]({duration:o.showDuration,easing:o.showEasing,complete:o.onShown}),0<o.timeOut&&(i=setTimeout(p,o.timeOut),c.maxHideTime=parseFloat(o.timeOut),c.hideEta=(new Date).getTime()+c.maxHideTime,o.progressBar&&(c.intervalId=setInterval(f,10))),function(){o.closeOnHover&&a.hover(m,g);!o.onclick&&o.tapToDismiss&&a.click(p);o.closeButton&&l&&l.click(function(e){e.stopPropagation?e.stopPropagation():void 0!==e.cancelBubble&&!0!==e.cancelBubble&&(e.cancelBubble=!0),o.onCloseClick&&o.onCloseClick(e),p(!0)});o.onclick&&a.click(function(e){o.onclick(e),p()})}(),O(d),o.debug&&console&&console.log(d),a}function u(e){return null==e&&(e=""),e.replace(/&/g,"&amp;").replace(/"/g,"&quot;").replace(/'/g,"&#39;").replace(/</g,"&lt;").replace(/>/g,"&gt;")}function p(e){var t=e&&!1!==o.closeMethod?o.closeMethod:o.hideMethod,s=e&&!1!==o.closeDuration?o.closeDuration:o.hideDuration,n=e&&!1!==o.closeEasing?o.closeEasing:o.hideEasing;if(!h(":focus",a).length||e)return clearTimeout(c.intervalId),a[t]({duration:s,easing:n,complete:function(){D(a),clearTimeout(i),o.onHidden&&"hidden"!==d.state&&o.onHidden(),d.state="hidden",d.endTime=new Date,O(d)}})}function g(){(0<o.timeOut||0<o.extendedTimeOut)&&(i=setTimeout(p,o.extendedTimeOut),c.maxHideTime=parseFloat(o.extendedTimeOut),c.hideEta=(new Date).getTime()+c.maxHideTime)}function m(){clearTimeout(i),c.hideEta=0,a.stop(!0,!0)[o.showMethod]({duration:o.showDuration,easing:o.showEasing})}function f(){var e=(c.hideEta-(new Date).getTime())/c.maxHideTime*100;r.width(e+"%")}}function b(){return h.extend({},{tapToDismiss:!0,atoastClass:"atoast",containerId:"atoast-container",debug:!1,showMethod:"fadeIn",showDuration:300,showEasing:"swing",onShown:void 0,hideMethod:"fadeOut",hideDuration:1e3,hideEasing:"swing",onHidden:void 0,closeMethod:!1,closeDuration:!1,closeEasing:!1,closeOnHover:!0,extendedTimeOut:1e3,iconClasses:{error:"atoast-error",info:"atoast-info",success:"atoast-success",warning:"atoast-warning"},iconClass:"atoast-info",positionClass:"atoast-top-right",timeOut:5e3,titleClass:"atoast-title",messageClass:"atoast-message",escapeHtml:!1,target:"body",closeHtml:'<button type="button">&times;</button>',closeClass:"atoast-close-button",newestOnTop:!0,preventDuplicates:!1,progressBar:!1,progressClass:"atoast-progress",rtl:!1},e.options)}function D(e){v||(v=T()),e.is(":visible")||(e.remove(),e=null,0===v.children().length&&(v.remove(),C=void 0))}}(window.jQuery);


jQuery( document ).ready(function() {

  /**
   * [bState Change Button State]
   * @param  {[type]} _state [description]
   * @return {[type]}        [description]
   */
  jQuery.fn.bootButton = function(_state) {

    //  Empty
    if(!this[0])return;

    if(_state == 'loading')
      this.attr('data-reset-text',this.html());

    if(_state == 'loading') {

      if(!this[0].dataset.resetText) {
        this[0].dataset.resetText = this.html();
      }

      this.addClass('disabled').attr('disabled','disabled').html('<i class="fa fa-circle-o-notch fa-spin"></i> ' + this[0].dataset.loadingText);
    }
    else if(_state == 'reset')
      this.removeClass('disabled').removeAttr('disabled').html(this[0].dataset.resetText);
    else if(_state == 'update')
      this.removeClass('disabled').removeAttr('disabled').html(this[0].dataset.updateText);
    else
      this.addClass('disabled').attr('disabled','disabled').html(this[0].dataset[_state+'Text']);
  };

  //  Serialize the Form
  jQuery.fn.ASLSerializeObject = function(){var o={};var a=this.serializeArray();jQuery.each(a,function(){if(o[this.name]!==undefined){if(!o[this.name].push){o[this.name]=[o[this.name]];}o[this.name].push(this.value||'');}else{o[this.name]=this.value||'';}});return o;};

  (function($) {
    
    var container = document.querySelector('#sl-frm.asl-form');


    //  Main container is missing!
    if(!container) {
      return;
    }

  
    // fetch all the forms we want to apply custom style
    var inputs = container.querySelectorAll('.asl-form .form-control');

    // loop over each input and watch blue event
    var validation = Array.prototype.filter.call(inputs, function(input) {
      
      input.addEventListener('focus', function(event) {

        input.parentNode.classList.add('is-focused');
      });

      input.addEventListener('blur', function(event) {
        
        input.parentNode.classList.remove('is-focused');

        // reset
        //input.parentNode.classList.remove('is-invalid')
        input.parentNode.classList.remove('has-error');
        
        if (input.checkValidity && input.checkValidity() === false) {
            input.parentNode.classList.add('has-error');
        }
        /*else {
          input.parentNode.classList.add('is-valid')
        }*/

      }, false);
    });





    

    //  Register button
    var $reg_btn    = $('.asl-cont #sl-btn-save');

    //  Agree Checkbox
    var agree_check = container.querySelector('#sl-agr-check');
    
    if(agree_check) {

      $(agree_check).bind('click', function(e) {

        if(this.checked) {
          $reg_btn.removeClass('disabled');
        }
        else
          $reg_btn.addClass('disabled');
      });
    }


    /**
     * [resetRegisterForm Reset the register form]
     * @return {[type]} [description]
     */
    function resetRegisterForm() {

      Array.prototype.filter.call(inputs, function(input) {

        input.value = '';
      });

      if(agree_check) {

        agree_check.checked = false;
        $reg_btn.addClass('disabled');
      }

    };
    
    

    //  Click Event of the save button
    $reg_btn.bind('click', function(e) {

      //  Clear previous messages
      atoastr.clear();


      //  Validate  the agree checkbox
      if(agree_check && !agree_check.checked) {
        agree_check.classList.add('is-invalid');
        return;
      }

      var form_data = {},
          is_valid  = true;

      Array.prototype.filter.call(inputs, function(_input) {

        form_data[_input.name] = _input.value;

        if(['city', 'description', 'country'].indexOf(_input.name) != -1 && !$.trim(_input.value)) {
          _input.parentNode.classList.add('has-error');
          is_valid = false;
        }
      });


      // Validate the Data 
      if(!is_valid) {
        atoastr.error((asl_form_configuration.words.fill_form || 'Please fill up the form.')); 
        return;
      }


      //  Add the nounce
      $.ajax({
        url: ASL_FORM.ajax_url,
        data: {action: 'asl_reg_store', form_params: form_data, vkey: ASL_FORM.vkey},
        type: 'POST',
        dataType: 'json',
        /**
         * [success description]
         * @param  {[type]} _data [description]
         * @return {[type]}       [description]
         */
        success: function(_response) {

          
          if (_response.success) {
            atoastr.success(_response.message);
            resetRegisterForm();

            //  When there is a redirect URL
            if(asl_form_configuration.redirect) {
              window.location = asl_form_configuration.redirect;
            }
            
          } else {
            atoastr.error((_response.message || 'Error in registering the form.'));
          }
        },
        /**
         * [error description]
         * @param  {[type]} _data [description]
         * @return {[type]}       [description]
         */
        error: function(_data) {}
      });
      
    });

  })(jQuery);
});
