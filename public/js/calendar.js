//$(document).ready(function(){$('.day').click(function (){alert($(this).find('.dayOfMonth').text())})});

$(document).ready(function()
    {
        $('.day').click(function ()
            {   var day = $(this).find('.dayOfMonth').text();
                var month = $(document).find('.month').text();
                var year = $(document).find('.year').text();

                if ($(this).hasClass('highlighted')) {
                    //var counter;
                    $(this).toggleClass('highlighted');
                    $.ajax({type: 'POST',
                            url: '/destroy',
                            data: {dayOfMonth: day, month: month, year: year},
                            success: function(response) {
                                //$(this).removeClass('highlighted');

                                //counter = $(document).find('.availableHolidays').text(parseInt($(document).find('.availableHolidays').text())+1);
                            }
                    });
                }
                else {
                    $(this).toggleClass('highlighted');
                    $.ajax({type: 'POST',
                            url: '/store',
                            data: {dayOfMonth: day, month: month, year: year},
                            success: function(response) {
                                //$(this).addClass('highlighted');
                                $(this).toggleClass('highlighted');
                                //counter = $(document).find('.availableHolidays').text(parseInt($(document).find('.availableHolidays').text())-1);
                            }
                    });
                }
            }
        )
    }
);



