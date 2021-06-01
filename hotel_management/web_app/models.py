from django.conf import settings
from django.contrib.auth.models import User
from django.db import models
from django.utils.functional import cached_property


class Role(models.Model):
    name = models.CharField(max_length=100)
    is_admin = models.BooleanField(default=False)
    is_reception = models.BooleanField(default=False)
    is_kitchen = models.BooleanField(default=False)
    is_accountant = models.BooleanField(default=False)

    def __str__(self):
        return self.name


def employee_document_directory_path(instance, filename):
    # this will return a file path that is unique for all the users
    return f'employees/document_{instance.user.pk}/{instance.user.pk}/{filename}'


class Employee(models.Model):
    user = models.OneToOneField(User, on_delete=models.CASCADE)
    name = models.CharField(max_length=256)
    contact = models.CharField(max_length=22)
    email = models.EmailField()
    dob = models.DateField()
    male = 'MALE'
    female = 'FEMALE'
    other = 'OTHER'
    gender_choices = (
        (male, 'Male'),
        (female, 'Female'),
        (other, 'Other'),
    )
    gender = models.CharField(choices=gender_choices, max_length=50)
    id_proof = models.FileField(upload_to=employee_document_directory_path, blank=True, null=True)
    role = models.ForeignKey(Role, on_delete=models.CASCADE)
    salary = models.DecimalField(max_digits=20, decimal_places=2)

    def __str__(self):
        return self.name

    def get_media_url(self):
        return f'{settings.MEDIA_URL}{self.id_proof}'


def guest_document_directory_path(instance, filename):
    # this will return a file path that is unique for all the users
    return f'guests/document_{instance.pk}/{instance.pk}/{filename}'


class Guest(models.Model):
    name = models.CharField(max_length=256)
    contact = models.CharField(max_length=22)
    email = models.EmailField(blank=True, null=True)
    dob = models.DateField(blank=True, null=True)
    male = 'MALE'
    female = 'FEMALE'
    other = 'OTHER'
    gender_choices = (
        (male, 'Male'),
        (female, 'Female'),
        (other, 'Other'),
    )
    gender = models.CharField(max_length=100, choices=gender_choices)
    id_proof = models.FileField(upload_to=guest_document_directory_path, blank=True, null=True)
    address = models.CharField(max_length=256)
    checked_in = models.BooleanField(default=True)
    is_in_hotel = models.BooleanField(default=True)

    def __str__(self):
        return f'{self.pk} {self.name}'

    def checkout(self):
        self.checked_in = False
        self.save(update_fields=['checked_in'])

    def got_out(self):
        self.is_in_hotel = False
        self.save(update_fields=['is_in_hotel'])

    def came_in(self):
        self.is_in_hotel = True
        self.save(update_fields=['is_in_hotel'])


class RoomType(models.Model):
    name = models.CharField(max_length=100)
    description = models.CharField(max_length=1024, null=True, blank=True)

    def __str__(self):
        return self.name


class Room(models.Model):
    number = models.CharField(max_length=20)
    name = models.CharField(max_length=100)
    room_type = models.ForeignKey(RoomType, on_delete=models.CASCADE)
    price_per_night = models.DecimalField(max_digits=20, decimal_places=2)
    marked_for_housekeep = models.BooleanField(default=False)

    def __str__(self):
        return self.name


class HallType(models.Model):
    name = models.CharField(max_length=100)
    description = models.CharField(max_length=1024, null=True, blank=True)

    def __str__(self):
        return self.name


class Hall(models.Model):
    number = models.CharField(max_length=6)
    name = models.CharField(max_length=100)
    hall_type = models.ForeignKey(HallType, on_delete=models.CASCADE)
    price_per_night = models.DecimalField(max_digits=20, decimal_places=2)
    marked_for_housekeep = models.BooleanField(default=False)

    def __str__(self):
        return self.name


class Booking(models.Model):
    room = models.ForeignKey(Room, blank=True, null=True, on_delete=models.PROTECT)
    hall = models.ForeignKey(Hall, blank=True, null=True, on_delete=models.PROTECT)
    guest = models.ForeignKey(Guest, on_delete=models.CASCADE)
    booked_from = models.DateTimeField()
    booked_to = models.DateTimeField()

    def __str__(self):
        return f'{self.room.number}'

    @cached_property
    def total_days(self):
        delta = self.booked_to - self.booked_from
        return delta.days

    def total_room_due(self):
        if self.room:
            return self.room.price_per_night * self.total_days
        elif self.hall:
            return self.hall.price_per_night * self.total_days


class FoodCategory(models.Model):
    name = models.CharField(max_length=100)
    is_complementary = models.BooleanField(default=False)

    def __str__(self):
        return self.name


class Food(models.Model):
    name = models.CharField(max_length=100)
    category = models.ForeignKey(FoodCategory, on_delete=models.PROTECT)
    price_per_serve = models.DecimalField(max_digits=20, decimal_places=2)

    def __str__(self):
        return self.name


class FoodOrder(models.Model):
    foods = models.ManyToManyField(Food)
    booking = models.ForeignKey(Booking, on_delete=models.CASCADE)
    date = models.DateTimeField(auto_now_add=True)

    def __str__(self):
        return f'{self.foods.name} {self.booking.guest.name}'

    @cached_property
    def total_price(self):
        total = 0
        for food in self.foods.all():
            total += food.price_per_serve
        return total


class ServiceType(models.Model):
    name = models.CharField(max_length=100)
    is_complementary = models.BooleanField(default=False)

    def __str__(self):
        return self.name


class Service(models.Model):
    name = models.CharField(max_length=100)
    price = models.DecimalField(max_digits=20, decimal_places=2)

    def __str__(self):
        return self.name


class Amenity(models.Model):
    name = models.CharField(max_length=100)
    price = models.DecimalField(max_digits=20, decimal_places=2)

    def __str__(self):
        return self.name


class ServiceBooking(models.Model):
    service = models.ForeignKey(Service, on_delete=models.PROTECT)
    booking = models.ForeignKey(Booking, on_delete=models.CASCADE)
    date = models.DateTimeField(auto_now_add=True)

    def __str__(self):
        return f'{self.service.name} {self.booking.guest.name}'


class PaymentMode(models.Model):
    name = models.CharField(max_length=100)
    is_cash = models.BooleanField(default=True)
    is_cheque = models.BooleanField(default=False)
    is_digital = models.BooleanField(default=False)

    def __str__(self):
        return self.name


class Discount(models.Model):
    percent = models.IntegerField()

    def __str__(self):
        return f'{self.percent}%'


class Invoice(models.Model):
    invoice_no = models.CharField(max_length=20)
    booking = models.ForeignKey(Booking, on_delete=models.CASCADE, blank=True, null=True)
    total_amount = models.DecimalField(max_digits=20, decimal_places=2)
    paid_amount = models.DecimalField(max_digits=20, decimal_places=2)
    pending_amount = models.DecimalField(max_digits=20, decimal_places=2)
    paid = 'PAID'
    partial = 'PARTIAL'
    unpaid = 'UNPAID'
    status_choices = (
        (paid, 'Paid'),
        (partial, 'Partial'),
        (unpaid, 'Unpaid'),
    )
    status = models.CharField(choices=status_choices, blank=True, null=True, max_length=100)

    def __str__(self):
        return f'{self.booking.guest.name} pending: {self.pending_amount}'

    def set_paid(self):
        self.status = self.paid
        self.save(update_fields=['status'])

    def set_partial(self):
        self.status = self.partial
        self.save(update_fields=['status'])

    def set_unpaid(self):
        self.status = self.unpaid
        self.save(update_fields=['status'])

    def set_invoice_number(self):
        self.invoice_no = f'IN{self.pk}'
        self.save(update_fields=['invoice_no'])

    def save(self, *args, **kwargs):
        if self.paid_amount == 0:
            self.set_unpaid()
        elif self.pending_amount != 0:
            self.set_partial()
        else:
            self.set_paid()
        super(Invoice, self).save(*args, **kwargs)


class BankAccount(models.Model):
    name = models.CharField(max_length=100)
    initial_balance = models.DecimalField(max_digits=20, decimal_places=2)
    current_balance = models.DecimalField(max_digits=20, decimal_places=2)
    is_cash_account = models.BooleanField(default=False)


class Payment(models.Model):
    booking = models.ForeignKey(Booking, on_delete=models.CASCADE)
    payment_mode = models.ForeignKey(PaymentMode, on_delete=models.PROTECT)
    bank_account = models.ForeignKey(BankAccount, on_delete=models.PROTECT)
    total_amount = models.DecimalField(max_digits=20, decimal_places=2)
    paid_amount = models.DecimalField(max_digits=20, decimal_places=2)
    pending_amount = models.DecimalField(max_digits=20, decimal_places=2)
    discount = models.ForeignKey(Discount, blank=True, null=True, on_delete=models.SET_NULL)
    discount_amount = models.DecimalField(max_digits=20, decimal_places=2)
    remark = models.CharField(max_length=150)

    def __str__(self):
        return f'{self.booking.guest.name} {self.total_amount}'


class RestaurantFoodOrder(models.Model):
    foods = models.ManyToManyField(Food)
    date = models.DateTimeField(auto_now_add=True)

    def __str__(self):
        return f'{self.foods.name}'

    @cached_property
    def total_price(self):
        total = 0
        for food in self.foods.all():
            total += food.price_per_serve
        return total


class ChequeDetail(models.Model):
    payment = models.ForeignKey(Payment, on_delete=models.CASCADE)
    bank_name = models.CharField(max_length=200)
    cheque_number = models.CharField(max_length=30)
    remark = models.CharField(max_length=100)
    received = 'RECEIVED'
    deposited = 'DEPOSITED'
    cleared = 'CLEARED'
    bounced = 'BOUNCED'
    cheque_status_choices = (
        (received, 'Received'),
        (deposited, 'Deposited'),
        (cleared, 'Cleared'),
        (bounced, 'Bounced'),
    )
    status = models.CharField(choices=cheque_status_choices, blank=True, null=True, max_length=100)

    def __str__(self):
        return f'{self.bank_name} {self.payment.total_amount}'

    def set_received(self):
        self.status = self.received
        self.save(update_fields=['status'])

    def set_deposited(self):
        self.status = self.deposited
        self.save(update_fields=['status'])

    def set_cleared(self):
        self.status = self.cleared
        self.save(update_fields=['status'])

    def set_bounced(self):
        self.status = self.bounced
        self.save(update_fields=['status'])


class DigitalPaymentDetail(models.Model):
    payment = models.ForeignKey(Payment, on_delete=models.CASCADE)
    ref_id = models.CharField(max_length=200)
    remark = models.CharField(max_length=100)

    def __str__(self):
        return f'{self.ref_id} {self.payment.total_amount}'


class ExpenseType(models.Model):
    name = models.CharField(max_length=100)
    repeat_monthly = models.BooleanField(default=False)

    def __str__(self):
        return self.name


class Expense(models.Model):
    name = models.CharField(max_length=100)
    type = models.ForeignKey(ExpenseType, on_delete=models.PROTECT)
    payment_mode = models.ForeignKey(PaymentMode, on_delete=models.PROTECT)
    amount = models.DecimalField(max_digits=20, decimal_places=2)
    remark = models.CharField(max_length=150)

    def __str__(self):
        return self.name
