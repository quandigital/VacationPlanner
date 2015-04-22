//$(document).ready(function(){$('.day').click(function (){alert($(this).find('.dayOfMonth').text())})});

$(document).ready(function()
    {
        $('.day').click(function ()
            {   var day = $(this).find('.dayOfMonth').text();
                var month = $(document).find('.month').text();
                var year = $(document).find('.year').text();
                var elem = $(this);
                var availableHolidays = $(document).find('.availableHolidays');
                if ($(this).hasClass('highlighted')) {

                    $.ajax({type: 'POST',
                            url: '/destroy',
                            data: {dayOfMonth: day, month: month, year: year},
                            complete: function() {
                                elem.addClass('complete');
                            },
                            success: function(data) {
                                elem.removeClass('complete');
                                elem.removeClass('highlighted');
                                availableHolidays.text((data.counter));
                            }

                    });
                }
                else {

                    $.ajax({type: 'POST',
                            url: '/store',
                            data: {dayOfMonth: day, month: month, year: year},
                            success: function(data) {
                                elem.addClass('highlighted');
                                availableHolidays.text((data.counter));
                            }

                    });
                }
            }
        )
    }
);



