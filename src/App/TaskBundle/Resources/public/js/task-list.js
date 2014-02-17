function loadTasks()
{
    $.ajax( taskListUrl, {
        success: function(data)
        {
            for ( var i = 0; i < data.length; i++ )
            {
                var $li = $('<li></li>');
                $li.text( data[i] );


                $('.task-list').append( $li );
            }
        }
    });

}