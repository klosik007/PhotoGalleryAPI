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

    run(sql, params = []) {
        return new Promise((resolve, reject) => {
            this.db.run(sql, params, (err) => {
                if (err) {
                    console.log('Could not run sql ${sql}\nError: ${err}')
                } else {
                    //resolve({})
                }
            })
        })
    }
}

export default AppDAO