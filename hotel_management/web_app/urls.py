from django.urls import path

from .views import *

urlpatterns = [
    path('', dashboard, name='dashboard'),
    path('bookings', bookings, name='bookings'),
    path('booked_rooms', booked_rooms, name='booked_rooms'),
    path('booked_halls', booked_halls, name='booked_halls'),
    path('guests', guests, name='guests'),
    path('food_orders', food_orders, name='food_orders'),
    path('expenses', expenses, name='expenses'),
    path('payments', payments, name='payments'),
    path('bank_accounts', bank_accounts, name='bank_accounts'),
    path('invoices', invoices, name='invoices'),
    path('employees', employees, name='employees'),
    path('room_types', room_types, name='room_types'),
    path('rooms', rooms, name='rooms'),
    path('hall_types', hall_types, name='hall_types'),
    path('halls', halls, name='halls'),
    path('food_menu', food_menu, name='food_menu'),
    path('paid_services', paid_services, name='paid_services'),
    path('users', users, name='users'),
]
