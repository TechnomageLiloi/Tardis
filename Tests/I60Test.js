describe('Tardis object', function() {
  it('Tardis sub-objects', function() {
    expect(Tardis instanceof Object).toBeTruthy();
    expect(Tardis.Application instanceof Object).toBeTruthy();
    expect(Tardis.Application.Diary instanceof Object).toBeTruthy();
  });

  it('Tardis.Application.Diary functions', function() {
    expect(Tardis.Application.Diary.create instanceof Function).toBeTruthy();
    expect(Tardis.Application.Diary.edit instanceof Function).toBeTruthy();
    expect(Tardis.Application.Diary.save instanceof Function).toBeTruthy();
    expect(Tardis.Application.Diary.show instanceof Function).toBeTruthy();
  });
});
