class User {
    constructor(dao) {
        this.dao = dao
    }

    createTable() {
        const query = 
        `
        CREATE TABLE IF NOT EXISTS user (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT,
            observers_count INTEGER,
            observants_count INTEGER,
            description TEXT,
            avatar BLOB,
        )
        `

        return this.dao.run(query)
    }

    addUser(name) {
        const query = 
        `
        INSERT INTO user (name) VALUES (?)
        `

        return this.dao.run(query, [name])
    }

    
}

export default User