class Message {
    constructor(dao) {
        this.dao = dao
    }

     createTable() {
        const query = 
        `
        CREATE TABLE IF NOT EXISTS message (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            content TEXT,
            user_id INTEGER,
            friend_id INTEGER,
            from_user BOOLEAN,
            from_friend BOOLEAN
        )
        `
     }
}