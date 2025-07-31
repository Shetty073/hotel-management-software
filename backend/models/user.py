from sqlalchemy import Column, Integer, String
from models.base import Base

class User(Base):
    __tablename__ = "users"

    id = Column(Integer, primary_key=True, index=True)
    first_name = Column(String(length=100), nullable=False)
    middlename = Column(String(length=100))
    last_name = Column(String(length=100), nullable=False)
    email = Column(String, unique=True, index=True, nullable=False)
    mobile_number = Column(String, unique=True, index=True)
    hashed_password = Column(String)
