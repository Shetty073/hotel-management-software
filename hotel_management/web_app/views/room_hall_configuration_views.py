from web_app.models import Room, RoomType
from django.shortcuts import redirect, render
from django.http import JsonResponse
from django.core.exceptions import ObjectDoesNotExist
import json


def room_types(request):
    room_types = RoomType.objects.all()

    context_dict = {
        'room_types': room_types
    }
    return render(request, 'room_types/room_types.html', context=context_dict)


def add_room_type(request):
    name = request.POST.get('name')
    description = request.POST.get('description')

    room_type = RoomType.objects.create(
        name=name,
        description=description,
    )
    room_type.save()

    return redirect(room_types)


def update_room_type(request):
    pk = request.POST.get('pk')
    name = request.POST.get('name')
    description = request.POST.get('description')

    try:
        room_type = RoomType.objects.get(pk=pk)
        room_type.name = name
        room_type.description = description
        room_type.save()
    except ObjectDoesNotExist as e:
        print(str(e))

    return redirect(room_types)


def delete_room_type(request):
    data = json.loads(request.body)
    pk = data['pk']
    response = {
        'process': 'success'
    }
    try:
        room_type = RoomType.objects.get(pk=pk)
        room_type.delete()
    except ObjectDoesNotExist as e:
        response = {
            'process': 'failed',
            'msg': str(e),
        }

    return JsonResponse(response)


def rooms(request):
    room_types = RoomType.objects.all()
    rooms = Room.objects.all()
    
    context_dict = {
        'room_types': room_types,
        'rooms': rooms,
    }
    return render(request, 'rooms/rooms.html', context=context_dict)


def add_room(request):
    room_type_pk = request.POST.get('room_type')
    number = request.POST.get('number')
    name = request.POST.get('name')
    price_per_night = request.POST.get('price_per_night')

    room_type = RoomType.objects.get(pk=room_type_pk)
    room = Room.objects.create(
        number=number,
        name=name,
        room_type=room_type,
        price_per_night=price_per_night,
    )
    room.save()

    return redirect(rooms)


def update_room(request):
    pk = request.POST.get('pk')
    room_type_pk = request.POST.get('room_type')
    number = request.POST.get('number')
    name = request.POST.get('name')
    price_per_night = request.POST.get('price_per_night')

    try:
        room_type = RoomType.objects.get(pk=room_type_pk)
        room = Room.objects.get(pk=pk)
        room.name = name
        room.number = number
        room.room_type = room_type
        room.price_per_night = price_per_night
        room.save()
    except ObjectDoesNotExist as e:
        print(str(e))

    return redirect(rooms)


def delete_room(request):
    data = json.loads(request.body)
    pk = data['pk']
    response = {
        'process': 'success'
    }
    try:
        room = Room.objects.get(pk=pk)
        room.delete()
    except ObjectDoesNotExist as e:
        response = {
            'process': 'failed',
            'msg': str(e),
        }

    return JsonResponse(response)


def hall_types(request):
    return render(request, 'hall_types/hall_types.html')


def halls(request):
    return render(request, 'halls/halls.html')
