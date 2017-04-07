$(document).ready(function() {

    $('[data-toggle="popover"]').popover();

    $('.members')
        .on('click','.add-member',function(){

            template = $('.member-template')
                .clone()
                .removeClass('hidden')
                .removeClass('member-template')
                .addClass('added-member')
                .find('.input-first')
                    .attr('name','member[name][]')
                    .prop('required', true)
                .parents('.added-member')
                .find('.input-last')
                    .attr('name','member[student_id][]')
                    .prop('required', true)
                .parents('.added-member');

            $('.members').append(template);

        }).on('click', '.remove-member', function(){
            $(this).parents('.added-member').remove();
        })

    $('.local-nav').affix({
      offset: {
        top: function () {
          return ($(window).width() >= 768) ? 115 : 50;
        }
      }
    }).on('affix-top.bs.affix', function(){
        $('.affix-fix').css('margin-top','0px');
    }).on('affix.bs.affix', function(){
        $('.affix-fix').css('margin-top','70px');
    });

});
