""" Test de la suppression d'une User Story """

import unittest
from webDriversOptions import chromeWebdriver
from webDriversOptions import waitURL
from webDriversOptions import browserRegister
from webDriversOptions import browserLogin
from webDriversOptions import browserLogout
from webDriversOptions import browserCreateProject
from webDriversOptions import browserDeleteProject
from consts import File


class DeleteProject(unittest.TestCase):
    """ Classe de test unittest """
    __PROJECT = "projet"

    def setUp(self):
        self.chrome = chromeWebdriver()

    def testDelete(self):
        """ Test la su^ression d'une US """
        self.chrome.get('http://php-apache:80')
        waitURL(self.chrome, File.HOME_PAGE)
        self.assertIn(File.HOME_PAGE, self.chrome.current_url)

        browserRegister(self.chrome)
        browserLogin(self.chrome)
        browserCreateProject(self.chrome, self.__PROJECT)

        self.assertIn(File.PROJECT_LIST, self.chrome.current_url)
        browserDeleteProject(self.chrome, self.__PROJECT)
        browserLogout(self.chrome)

    def tearDown(self):
        self.chrome.quit()


if __name__ == "__main__":
    unittest.main()
