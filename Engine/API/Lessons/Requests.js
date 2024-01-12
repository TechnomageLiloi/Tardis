Rune.Lessons = {
    timetable: function ()
    {
        API.request('Rune.Lessons.Timetable', {

        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    update: function (key_lesson)
    {
        API.request('Rune.Lessons.Update', {
            'key_lesson': key_lesson
        }, function (data) {
            Rune.Lessons.timetable();
        }, function () {

        });
    },

    schedule: function (date_now)
    {
        API.request('Rune.Lessons.Schedule', {
            'date_now': date_now
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    collection: function (key_problem)
    {
        API.request('Rune.Lessons.Collection', {
            'key_problem': key_problem
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    show: function (uid)
    {
        API.request('Rune.Blueprints.Show', {
            'uid': uid
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

        API.request('Rune.Lessons.Create', {

        }, function (data) {
            Rune.Application.Diary.show('now');
        }, function () {

        });
    },

    remove: function (key_lesson, key_problem)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Rune.Lessons.Remove', {
            'key_lesson': key_lesson
        }, function (data) {
            Rune.Lessons.collection(key_problem);
        }, function () {

        });
    },

    edit: function (key_lesson)
    {
        API.request('Rune.Lessons.Edit', {
            'key_lesson': key_lesson
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    save: function (key_lesson)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#blueprint-edit');
        API.request('Rune.Lessons.Save', {
            'key_lesson': key_lesson,
            'key_atom': jq_block.find('[name="key_atom"]').val(),
            'comment': jq_block.find('[name="comment"]').val(),
            'mark': jq_block.find('[name="mark"]').val(),
            'status': jq_block.find('[name="status"]').val(),
            'start': jq_block.find('[name="start"]').val(),
            'finish': jq_block.find('[name="finish"]').val(),
            'type': jq_block.find('[name="type"]').val(),
            'tags': jq_block.find('[name="tags"]').val(),
            'data': jq_block.find('[name="data"]').val()
        }, function (data) {
            Rune.Application.Diary.show('now');
        }, function () {

        });
    }
}