from fastapi import FastAPI

app = FastAPI(
    debug=True,
    title="HMS - Hotel Management System",
    summary="- powered by FastAPI and PostgreSQL",
    description="HMS is a web based hotel management system solution built using FastAPI",
    version="0.0.1a"
)


@app.get("/health")
async def health():
    return {"message": "Ok"}