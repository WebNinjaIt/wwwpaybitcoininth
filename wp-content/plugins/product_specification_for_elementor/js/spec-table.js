﻿jQuery(document).ready(function($){
  'use strict';
  
  $(window).on('resize', function(){
  if($('.temegum-spec-table .spec-desc').length){
      $('.temegum-spec-table .spec-desc').each(function(){

        var spec = $(this).find('.spec-content').clone(false), spec_value = $(this).siblings('.spec-value');
        if(spec_value.length && ! spec_value.find('.spec-content').length ){
          spec_value.prepend(spec);
        }
      });
    }
  });

  $(window).resize();

  if($('.universal-switch').length){
    $('.universal-switch').each(function(){

      var tgl_btn = $(this).find('.switcher'),target_box, swiches;
      if($(this).data('target') !=''){
        target_box = $('#'+ $(this).data('target'));
      }
      else{
        target_box = $(this).closest('section.elementor-section');
      }

      if( typeof target_box !='undefined'){
        swiches = $(target_box).find('.has-double');
      }

       tgl_btn.each(function(){
        $(this).on("click", function(e){
          e.preventDefault();
          var $this= $(this);
          tgl_btn.removeClass('active'),
          $this.addClass('active');

          if(typeof swiches !='undefined' ){

            swiches.each(function(){

              var first_lbl = $(this).find('.even-value'),second_lbl = $(this).find('.odd-value');

                if($this.hasClass('second-value')){

                  second_lbl.show();;
                  first_lbl.hide();

                }else{
                  first_lbl.show();   
                  second_lbl.hide();
                }

            });
          }
        });
       });
    });
  }
});