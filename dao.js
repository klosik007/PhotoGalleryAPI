import sqlite3 from 'sqlite3'
import Promise from 'bluebird'

class AppDAO {
    constructor(dbPath) {
        this.db = new sqlite3.Database(dbPath, (err) => {
            if (err) {
                console.log("Could not connect to database")
            } else {
                console.log("Connected to database")
            }
        })
    }
}

export default AppDAO