Interstate60.Application = {
    Diary: {
        show: function (key_day)
        {
            if(typeof(key_day) === 'undefined')
            {
                key_day = $('#application-diary-show [name=key_day]').val();
            }

            API.request('Interstate60.Application.Diary.Show', {
                key_day: key_day
            }, function (data) {
                $('#page').html(data.render);
            }, function () {

            });
        },

        edit: function (key_day)
        {
            if(typeof(key_day) === 'undefined')
            {
                key_day = $('#application-diary-show [name=key_day]').val();
            }

            API.request('Interstate60.Application.Diary.Edit', {
                key_day: key_day
            }, function (data) {
                const wrap = $('#page');
                wrap.html(data.render);
                wrap.show();
            }, function () {

            });
        },

        save: function (key_day)
        {
            if(!confirm('Are you sure?'))
            {
                return;
            }

            const jq_block = $('#application-diary-edit');
            API.request('Interstate60.Application.Diary.Save', {
                key_day: key_day,
                title: jq_block.find('[name=title]').val(),
                program: jq_block.find('[name=program]').val(),
                data: jq_block.find('[name=data]').val(),
            }, function (data) {
                Interstate60.Application.Diary.show(key_day);
            }, function () {

            });
        }
    },

    Tickets: {
        collection: function ()
        {
            API.request('Interstate60.Application.Tickets.Collection', {

            }, function (data) {
                $('#page').html(data.render);
            }, function () {

            });
        },

        create: function ()
        {
            if(!confirm('Are you sure?'))
            {
                return;
            }

            API.request('Interstate60.Application.Tickets.Create', {
            }, function (data) {
                Interstate60.Application.Tickets.collection(true);
            }, function () {

            });
        },

        edit: function (key_ticket)
        {
            API.request('Interstate60.Application.Tickets.Edit', {
                key_ticket: key_ticket
            }, function (data) {
                const wrap = $('#page');
                wrap.html(data.render);
                wrap.show();
            }, function () {

            });
        },

        save: function (key_ticket)
        {
            if(!confirm('Are you sure?'))
            {
                return;
            }

            const jq_block = $('#artifacts-atoms-edit');
            API.request('Interstate60.Application.Tickets.Save', {
                key_ticket: key_ticket,
                title: jq_block.find('[name=title]').val(),
                start: jq_block.find('[name=start]').val(),
                finish: jq_block.find('[name=finish]').val(),
                link: jq_block.find('[name=link]').val(),
                status: jq_block.find('[name=status]').val(),
                difficulty: jq_block.find('[name=difficulty]').val(),
                program: jq_block.find('[name=program]').val()
            }, function (data) {
                Interstate60.Application.Tickets.collection(true);
            }, function () {

            });
        }
    }
}