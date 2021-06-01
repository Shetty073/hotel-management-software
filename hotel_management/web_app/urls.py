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
    path('add_room_type', add_room_type, name='add_room_type'),
    path('update_room_type', update_room_type, name='update_room_type'),
    path('delete_room_type', delete_room_type, name='delete_room_type'),

    path('rooms', rooms, name='rooms'),
    path('add_room', add_room, name='add_room'),
    path('update_room', update_room, name='update_room'),
    path('delete_room', delete_room, name='delete_room'),

    path('hall_types', hall_types, name='hall_types'),
    path('add_hall_type', add_hall_type, name='add_hall_type'),
    path('update_hall_type', update_hall_type, name='update_hall_type'),
    path('delete_hall_type', delete_hall_type, name='delete_hall_type'),

    path('halls', halls, name='halls'),
    path('add_hall', add_hall, name='add_hall'),
    path('update_hall', update_hall, name='update_hall'),
    path('delete_hall', delete_hall, name='delete_hall'),

    path('food_menu', food_menu, name='food_menu'),
    path('paid_services', paid_services, name='paid_services'),
    path('amenities', amenities, name='amenities'),
    path('users', users, name='users'),
]
