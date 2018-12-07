""" Test de la suppression d'une User Story """

import unittest
from webDriversOptions import chrome_webdriver
from webDriversOptions import wait_url
from webDriversOptions import browser_register
from webDriversOptions import browser_login
from webDriversOptions import browser_logout
from webDriversOptions import browser_create_project
from webDriversOptions import browser_delete_project
from consts import File


class DeleteProject(unittest.TestCase):
    """ Classe de test unittest """
    __PROJECT = "projet"

    def setUp(self):
        self.chrome = chrome_webdriver()

    def test_delete(self):
        """ Test la su^ression d'une US """
        self.assertIn(File.HOME_PAGE, self.chrome.current_url)

        browser_register(self.chrome)
        browser_login(self.chrome)
        browser_create_project(self.chrome, self.__PROJECT)

        self.assertIn(File.PROJECT_LIST, self.chrome.current_url)
        browser_delete_project(self.chrome, self.__PROJECT)
        browser_logout(self.chrome)

    def tearDown(self):
        self.chrome.quit()


if __name__ == "__main__":
    unittest.mai_d()
