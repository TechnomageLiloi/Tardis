Tardis.Lessons = {
    timetable: function ()
    {
        API.request('Tardis.Lessons.Timetable', {

        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    update: function (key_lesson)
    {
        API.request('Tardis.Lessons.Update', {
            'key_lesson': key_lesson
        }, function (data) {
            Tardis.Lessons.timetable();
        }, function () {

        });
    },

    schedule: function (date_now)
    {
        API.request('Tardis.Lessons.Schedule', {
            'date_now': date_now
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    collection: function (key_problem)
    {
        API.request('Tardis.Lessons.Collection', {
            'key_problem': key_problem
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    show: function (uid)
    {
        API.request('Tardis.Blueprints.Show', {
            'uid': uid
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    create: function (key_problem)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Tardis.Lessons.Create', {
            'key_problem': key_problem
        }, function (data) {
            Tardis.Lessons.collection(key_problem);
        }, function () {

        });
    },

    remove: function (key_lesson, key_problem)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Tardis.Lessons.Remove', {
            'key_lesson': key_lesson
        }, function (data) {
            Tardis.Lessons.collection(key_problem);
        }, function () {

        });
    },

    edit: function (key_lesson)
    {
        API.request('Tardis.Lessons.Edit', {
            'key_lesson': key_lesson
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    save: function (key_lesson, key_problem)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#blueprint-edit');
        API.request('Tardis.Lessons.Save', {
            'key_lesson': key_lesson,
            'comment': jq_block.find('[name="comment"]').val(),
            'mark': jq_block.find('[name="mark"]').val(),
            'status': jq_block.find('[name="status"]').val(),
            'start': jq_block.find('[name="start"]').val(),
            'finish': jq_block.find('[name="finish"]').val(),
            'data': jq_block.find('[name="data"]').val()
        }, function (data) {
            Tardis.Lessons.collection(key_problem);
        }, function () {

        });
    }
}