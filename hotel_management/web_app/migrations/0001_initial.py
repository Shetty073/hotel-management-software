# Generated by Django 3.2.3 on 2021-05-28 07:59

from django.conf import settings
from django.db import migrations, models
import django.db.models.deletion
import web_app.models


class Migration(migrations.Migration):

    initial = True

    dependencies = [
        migrations.swappable_dependency(settings.AUTH_USER_MODEL),
    ]

    operations = [
        migrations.CreateModel(
            name='BankAccount',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=100)),
                ('initial_balance', models.DecimalField(decimal_places=2, max_digits=20)),
                ('current_balance', models.DecimalField(decimal_places=2, max_digits=20)),
                ('is_cash_account', models.BooleanField(default=False)),
            ],
        ),
        migrations.CreateModel(
            name='Booking',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('booked_from', models.DateTimeField()),
                ('booked_to', models.DateTimeField()),
            ],
        ),
        migrations.CreateModel(
            name='Discount',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('percent', models.IntegerField()),
            ],
        ),
        migrations.CreateModel(
            name='ExpenseType',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=100)),
                ('repeat_monthly', models.BooleanField(default=False)),
            ],
        ),
        migrations.CreateModel(
            name='Food',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=100)),
                ('price_per_serve', models.DecimalField(decimal_places=2, max_digits=20)),
            ],
        ),
        migrations.CreateModel(
            name='FoodCategory',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=100)),
                ('is_complementary', models.BooleanField(default=False)),
            ],
        ),
        migrations.CreateModel(
            name='Guest',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=256)),
                ('contact', models.CharField(max_length=22)),
                ('email', models.EmailField(blank=True, max_length=254, null=True)),
                ('dob', models.DateField(blank=True, null=True)),
                ('gender', models.CharField(choices=[('MALE', 'Male'), ('FEMALE', 'Female'), ('OTHER', 'Other')], max_length=100)),
                ('id_proof', models.FileField(blank=True, null=True, upload_to=web_app.models.guest_document_directory_path)),
                ('address', models.CharField(max_length=256)),
                ('checked_in', models.BooleanField(default=True)),
                ('is_in_hotel', models.BooleanField(default=True)),
            ],
        ),
        migrations.CreateModel(
            name='HallType',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=100)),
            ],
        ),
        migrations.CreateModel(
            name='PaymentMode',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=100)),
                ('is_cash', models.BooleanField(default=True)),
                ('is_cheque', models.BooleanField(default=False)),
                ('is_digital', models.BooleanField(default=False)),
            ],
        ),
        migrations.CreateModel(
            name='Role',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=100)),
                ('is_admin', models.BooleanField(default=False)),
                ('is_reception', models.BooleanField(default=False)),
                ('is_kitchen', models.BooleanField(default=False)),
                ('is_accountant', models.BooleanField(default=False)),
            ],
        ),
        migrations.CreateModel(
            name='RoomType',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=100)),
            ],
        ),
        migrations.CreateModel(
            name='Service',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=100)),
                ('price', models.DecimalField(decimal_places=2, max_digits=20)),
            ],
        ),
        migrations.CreateModel(
            name='ServiceType',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=100)),
                ('is_complementary', models.BooleanField(default=False)),
            ],
        ),
        migrations.CreateModel(
            name='ServiceBooking',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('date', models.DateTimeField(auto_now_add=True)),
                ('booking', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='web_app.booking')),
                ('service', models.ForeignKey(on_delete=django.db.models.deletion.PROTECT, to='web_app.service')),
            ],
        ),
        migrations.CreateModel(
            name='Room',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('number', models.CharField(max_length=20)),
                ('name', models.CharField(max_length=100)),
                ('price_per_night', models.DecimalField(decimal_places=2, max_digits=20)),
                ('room_type', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='web_app.roomtype')),
            ],
        ),
        migrations.CreateModel(
            name='RestaurantFoodOrder',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('date', models.DateTimeField(auto_now_add=True)),
                ('foods', models.ManyToManyField(to='web_app.Food')),
            ],
        ),
        migrations.CreateModel(
            name='Payment',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('total_amount', models.DecimalField(decimal_places=2, max_digits=20)),
                ('paid_amount', models.DecimalField(decimal_places=2, max_digits=20)),
                ('pending_amount', models.DecimalField(decimal_places=2, max_digits=20)),
                ('discount_amount', models.DecimalField(decimal_places=2, max_digits=20)),
                ('remark', models.CharField(max_length=150)),
                ('bank_account', models.ForeignKey(on_delete=django.db.models.deletion.PROTECT, to='web_app.bankaccount')),
                ('booking', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='web_app.booking')),
                ('discount', models.ForeignKey(blank=True, null=True, on_delete=django.db.models.deletion.SET_NULL, to='web_app.discount')),
                ('payment_mode', models.ForeignKey(on_delete=django.db.models.deletion.PROTECT, to='web_app.paymentmode')),
            ],
        ),
        migrations.CreateModel(
            name='Invoice',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('invoice_no', models.CharField(max_length=20)),
                ('total_amount', models.DecimalField(decimal_places=2, max_digits=20)),
                ('paid_amount', models.DecimalField(decimal_places=2, max_digits=20)),
                ('pending_amount', models.DecimalField(decimal_places=2, max_digits=20)),
                ('status', models.CharField(blank=True, choices=[('PAID', 'Paid'), ('PARTIAL', 'Partial'), ('UNPAID', 'Unpaid')], max_length=100, null=True)),
                ('booking', models.ForeignKey(blank=True, null=True, on_delete=django.db.models.deletion.CASCADE, to='web_app.booking')),
            ],
        ),
        migrations.CreateModel(
            name='Hall',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('number', models.CharField(max_length=6)),
                ('name', models.CharField(max_length=100)),
                ('price_per_night', models.DecimalField(decimal_places=2, max_digits=20)),
                ('hall_type', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='web_app.halltype')),
            ],
        ),
        migrations.CreateModel(
            name='FoodOrder',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('date', models.DateTimeField(auto_now_add=True)),
                ('booking', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='web_app.booking')),
                ('foods', models.ManyToManyField(to='web_app.Food')),
            ],
        ),
        migrations.AddField(
            model_name='food',
            name='category',
            field=models.ForeignKey(on_delete=django.db.models.deletion.PROTECT, to='web_app.foodcategory'),
        ),
        migrations.CreateModel(
            name='Expense',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=100)),
                ('amount', models.DecimalField(decimal_places=2, max_digits=20)),
                ('remark', models.CharField(max_length=150)),
                ('payment_mode', models.ForeignKey(on_delete=django.db.models.deletion.PROTECT, to='web_app.paymentmode')),
                ('type', models.ForeignKey(on_delete=django.db.models.deletion.PROTECT, to='web_app.expensetype')),
            ],
        ),
        migrations.CreateModel(
            name='Employee',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=256)),
                ('contact', models.CharField(max_length=22)),
                ('email', models.EmailField(max_length=254)),
                ('dob', models.DateField()),
                ('gender', models.CharField(choices=[('MALE', 'Male'), ('FEMALE', 'Female'), ('OTHER', 'Other')], max_length=50)),
                ('id_proof', models.FileField(blank=True, null=True, upload_to=web_app.models.employee_document_directory_path)),
                ('salary', models.DecimalField(decimal_places=2, max_digits=20)),
                ('role', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='web_app.role')),
                ('user', models.OneToOneField(on_delete=django.db.models.deletion.CASCADE, to=settings.AUTH_USER_MODEL)),
            ],
        ),
        migrations.CreateModel(
            name='DigitalPaymentDetail',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('ref_id', models.CharField(max_length=200)),
                ('remark', models.CharField(max_length=100)),
                ('payment', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='web_app.payment')),
            ],
        ),
        migrations.CreateModel(
            name='ChequeDetail',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('bank_name', models.CharField(max_length=200)),
                ('cheque_number', models.CharField(max_length=30)),
                ('remark', models.CharField(max_length=100)),
                ('status', models.CharField(blank=True, choices=[('RECEIVED', 'Received'), ('DEPOSITED', 'Deposited'), ('CLEARED', 'Cleared'), ('BOUNCED', 'Bounced')], max_length=100, null=True)),
                ('payment', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='web_app.payment')),
            ],
        ),
        migrations.AddField(
            model_name='booking',
            name='guest',
            field=models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='web_app.guest'),
        ),
        migrations.AddField(
            model_name='booking',
            name='hall',
            field=models.ForeignKey(blank=True, null=True, on_delete=django.db.models.deletion.PROTECT, to='web_app.hall'),
        ),
        migrations.AddField(
            model_name='booking',
            name='room',
            field=models.ForeignKey(blank=True, null=True, on_delete=django.db.models.deletion.PROTECT, to='web_app.room'),
        ),
    ]
