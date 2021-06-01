from web_app.models import Hall, HallType, Room, RoomType
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
    hall_types = HallType.objects.all()

    context_dict = {
        'hall_types': hall_types
    }

    return render(request, 'hall_types/hall_types.html', context=context_dict)


def add_hall_type(request):
    name = request.POST.get('name')
    description = request.POST.get('description')

    hall_type = HallType.objects.create(
        name=name,
        description=description,
    )
    hall_type.save()

    return redirect(hall_types)


def update_hall_type(request):
    pk = request.POST.get('pk')
    name = request.POST.get('name')
    description = request.POST.get('description')

    try:
        hall_type = HallType.objects.get(pk=pk)
        hall_type.name = name
        hall_type.description = description
        hall_type.save()
    except ObjectDoesNotExist as e:
        print(str(e))

    return redirect(hall_types)


def delete_hall_type(request):
    data = json.loads(request.body)
    pk = data['pk']
    response = {
        'process': 'success'
    }
    try:
        hall_type = HallType.objects.get(pk=pk)
        hall_type.delete()
    except ObjectDoesNotExist as e:
        response = {
            'process': 'failed',
            'msg': str(e),
        }

    return JsonResponse(response)


def halls(request):
    hall_types = HallType.objects.all()
    halls = Hall.objects.all()
    
    context_dict = {
        'hall_types': hall_types,
        'halls': halls,
    }

    return render(request, 'halls/halls.html', context=context_dict)


def add_hall(request):
    hall_type_pk = request.POST.get('hall_type')
    number = request.POST.get('number')
    name = request.POST.get('name')
    price_per_night = request.POST.get('price_per_night')

    hall_type = HallType.objects.get(pk=hall_type_pk)
    hall = Hall.objects.create(
        number=number,
        name=name,
        hall_type=hall_type,
        price_per_night=price_per_night,
    )
    hall.save()

    return redirect(halls)


def update_hall(request):
    pk = request.POST.get('pk')
    hall_type_pk = request.POST.get('hall_type')
    number = request.POST.get('number')
    name = request.POST.get('name')
    price_per_night = request.POST.get('price_per_night')

    try:
        hall_type = HallType.objects.get(pk=hall_type_pk)
        hall = Hall.objects.get(pk=pk)
        hall.name = name
        hall.number = number
        hall.hall_type = hall_type
        hall.price_per_night = price_per_night
        hall.save()
    except ObjectDoesNotExist as e:
        print(str(e))

    return redirect(halls)


def delete_hall(request):
    data = json.loads(request.body)
    pk = data['pk']
    response = {
        'process': 'success'
    }
    try:
        hall = Hall.objects.get(pk=pk)
        hall.delete()
    except ObjectDoesNotExist as e:
        response = {
            'process': 'failed',
            'msg': str(e),
        }

    return JsonResponse(response)