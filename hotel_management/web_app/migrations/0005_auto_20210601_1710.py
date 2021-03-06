# Generated by Django 3.2.3 on 2021-06-01 11:40

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('web_app', '0004_amenity'),
    ]

    operations = [
        migrations.AddField(
            model_name='hall',
            name='marked_for_housekeep',
            field=models.BooleanField(default=False),
        ),
        migrations.AddField(
            model_name='halltype',
            name='description',
            field=models.CharField(blank=True, max_length=1024, null=True),
        ),
    ]
